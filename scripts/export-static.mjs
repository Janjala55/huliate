import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const SITE_ROOT = path.resolve(__dirname, '..');
const DIST_DIR = path.resolve(SITE_ROOT, 'dist');
const BASE_ORIGIN = 'http://localhost:8885';
const TARGET_DOMAIN = 'https://huliate.com'; // or relative '/'

console.log('--- Starting Huliate Static Exporter ---');
console.log(`Source: ${BASE_ORIGIN}`);
console.log(`Target: ${DIST_DIR}`);

if (!fs.existsSync(DIST_DIR)) {
  fs.mkdirSync(DIST_DIR, { recursive: true });
}

const visitedUrls = new Set();
const queue = ['/'];
const assetQueue = new Set();

// Helper to sanitize path for Windows
function urlToFilePath(urlPath) {
  let clean = urlPath.split('?')[0].split('#')[0];
  if (clean === '' || clean === '/') {
    return path.join(DIST_DIR, 'index.html');
  }
  
  if (clean.endsWith('/')) {
    clean = clean.slice(0, -1);
  }
  
  // If it looks like a file with extension
  const ext = path.extname(clean);
  if (ext && ext.length <= 5) {
    return path.join(DIST_DIR, clean.replace(/^\//, '').replace(/\//g, path.sep));
  }
  
  // Otherwise treat as directory with index.html
  return path.join(DIST_DIR, clean.replace(/^\//, '').replace(/\//g, path.sep), 'index.html');
}

async function fetchInitialRoutes() {
  try {
    const pagesRes = await fetch(`${BASE_ORIGIN}/wp-json/wp/v2/pages?per_page=100`);
    if (pagesRes.ok) {
      const pages = await pagesRes.json();
      for (const p of pages) {
        const u = new URL(p.link).pathname;
        if (!visitedUrls.has(u)) queue.push(u);
      }
    }

    const postsRes = await fetch(`${BASE_ORIGIN}/wp-json/wp/v2/posts?per_page=100`);
    if (postsRes.ok) {
      const posts = await postsRes.json();
      for (const p of posts) {
        const u = new URL(p.link).pathname;
        if (!visitedUrls.has(u)) queue.push(u);
      }
    }

    const catRes = await fetch(`${BASE_ORIGIN}/wp-json/wp/v2/categories?per_page=100`);
    if (catRes.ok) {
      const cats = await catRes.json();
      for (const c of cats) {
        const u = new URL(c.link).pathname;
        if (!visitedUrls.has(u)) queue.push(u);
      }
    }
  } catch (err) {
    console.error('Error fetching initial routes:', err.message);
  }
}

async function downloadAsset(assetPath) {
  const clean = assetPath.split('?')[0].split('#')[0];
  const targetFile = path.join(DIST_DIR, clean.replace(/^\//, '').replace(/\//g, path.sep));
  
  if (fs.existsSync(targetFile)) return;

  fs.mkdirSync(path.dirname(targetFile), { recursive: true });
  
  try {
    const res = await fetch(`${BASE_ORIGIN}${clean}`);
    if (!res.ok) {
      console.warn(`[Asset 404] ${clean}`);
      return;
    }
    const arrayBuffer = await res.arrayBuffer();
    fs.writeFileSync(targetFile, Buffer.from(arrayBuffer));
    console.log(`[Asset Saved] ${clean}`);
  } catch (err) {
    console.error(`[Asset Error] ${clean}:`, err.message);
  }
}

function processHtml(html, currentPath) {
  // Discover internal links
  const linkRegex = /(?:href|src|srcset|poster|action)=["']([^"']+)["']/gi;
  let match;
  while ((match = linkRegex.exec(html)) !== null) {
    const val = match[1];
    
    // Check for srcset format (val1 1x, val2 2x)
    const items = val.split(',').map(s => s.trim().split(' ')[0]);
    for (const item of items) {
      if (item.startsWith(BASE_ORIGIN) || (item.startsWith('/') && !item.startsWith('//'))) {
        let relative = item.replace(BASE_ORIGIN, '');
        const clean = relative.split('?')[0].split('#')[0];
        const ext = path.extname(clean).toLowerCase();
        
        if (['.css', '.js', '.jpg', '.jpeg', '.png', '.gif', '.svg', '.webp', '.ico', '.woff', '.woff2', '.ttf', '.eot'].includes(ext)) {
          assetQueue.add(relative);
        } else if (clean.startsWith('/wp-content/') || clean.startsWith('/wp-includes/')) {
          assetQueue.add(relative);
        } else if (!clean.startsWith('/wp-admin') && !clean.startsWith('/wp-json') && !clean.startsWith('/wp-login')) {
          if (!visitedUrls.has(clean) && !queue.includes(clean)) {
            queue.push(clean);
          }
        }
      }
    }
  }

  // Also extract url(...) from inline styles
  const urlRegex = /url\(['"]?([^'"()]+)['"]?\)/gi;
  while ((match = urlRegex.exec(html)) !== null) {
    const item = match[1];
    if (item.startsWith(BASE_ORIGIN) || (item.startsWith('/') && !item.startsWith('//'))) {
      let relative = item.replace(BASE_ORIGIN, '');
      const clean = relative.split('?')[0].split('#')[0];
      const ext = path.extname(clean).toLowerCase();
      if (['.css', '.js', '.jpg', '.jpeg', '.png', '.gif', '.svg', '.webp', '.ico', '.woff', '.woff2', '.ttf', '.eot'].includes(ext)) {
        assetQueue.add(relative);
      }
    }
  }

  // Replace base origin with relative root '/' or target domain
  let rewritten = html.replaceAll(BASE_ORIGIN, '');
  // Make sure root empty becomes '/'
  rewritten = rewritten.replaceAll('href=""', 'href="/"');
  return rewritten;
}

async function run() {
  await fetchInitialRoutes();
  console.log(`Discovered ${queue.length} initial HTML routes.`);

  while (queue.length > 0) {
    const currentPath = queue.shift();
    if (visitedUrls.has(currentPath)) continue;
    visitedUrls.add(currentPath);

    console.log(`Crawling: ${currentPath}`);
    try {
      const res = await fetch(`${BASE_ORIGIN}${currentPath}`);
      if (!res.ok) {
        console.warn(`[Page ${res.status}] ${currentPath}`);
        continue;
      }
      const rawHtml = await res.text();
      const processedHtml = processHtml(rawHtml, currentPath);
      
      const outFile = urlToFilePath(currentPath);
      fs.mkdirSync(path.dirname(outFile), { recursive: true });
      fs.writeFileSync(outFile, processedHtml, 'utf8');
    } catch (err) {
      console.error(`Error crawling ${currentPath}:`, err.message);
    }
  }

  console.log(`\nFound ${assetQueue.size} assets to download...`);
  for (const assetPath of assetQueue) {
    await downloadAsset(assetPath);
  }

  // Also copy entire wp-content/themes/nourish-pure/assets if exists
  const themeAssetsDir = path.join(SITE_ROOT, 'wp-content', 'themes', 'nourish-pure');
  if (fs.existsSync(themeAssetsDir)) {
    const targetThemeDir = path.join(DIST_DIR, 'wp-content', 'themes', 'nourish-pure');
    fs.cpSync(themeAssetsDir, targetThemeDir, {
      recursive: true,
      filter: (src) => !src.endsWith('.php') && !src.endsWith('.sql')
    });
    console.log('Copied theme assets to dist');
  }

  // Also copy wp-content/uploads if exists
  const uploadsDir = path.join(SITE_ROOT, 'wp-content', 'uploads');
  if (fs.existsSync(uploadsDir)) {
    const targetUploads = path.join(DIST_DIR, 'wp-content', 'uploads');
    fs.cpSync(uploadsDir, targetUploads, { recursive: true });
    console.log('Copied wp-content/uploads to dist');
  }

  // Write a clean 404 page if not exists
  const notFoundPath = path.join(DIST_DIR, '404.html');
  if (!fs.existsSync(notFoundPath)) {
    const homeHtml = path.join(DIST_DIR, 'index.html');
    if (fs.existsSync(homeHtml)) {
      fs.copyFileSync(homeHtml, notFoundPath);
    }
  }

  // Write Cloudflare Pages _headers or _routes.json
  const headersFile = path.join(DIST_DIR, '_headers');
  fs.writeFileSync(headersFile, `/*\n  X-Frame-Options: SAMEORIGIN\n  X-Content-Type-Options: nosniff\n  Referrer-Policy: strict-origin-when-cross-origin\n/assets/*\n  Cache-Control: public, max-age=31536000, immutable\n`, 'utf8');

  console.log('\n--- Export Completed Successfully! ---');
  console.log(`Generated static site in: ${DIST_DIR}`);
}

run();
