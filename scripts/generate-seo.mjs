import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const SITE_ROOT = path.resolve(__dirname, '..');
const DIST_DIR = path.resolve(SITE_ROOT, 'dist');
const TARGET_DOMAIN = 'https://huliate.com';
const INDEXNOW_KEY = 'f6c91a3e892d4f57a03bc5e243918b95';

console.log('--- Generating SEO, Sitemaps & Bing/Google Indexing Assets ---');

if (!fs.existsSync(DIST_DIR)) {
  fs.mkdirSync(DIST_DIR, { recursive: true });
}

// 1. Generate IndexNow Verification Files
const indexNowKeyFile = path.join(DIST_DIR, `${INDEXNOW_KEY}.txt`);
fs.writeFileSync(indexNowKeyFile, INDEXNOW_KEY, 'utf8');
const indexNowAliasFile = path.join(DIST_DIR, 'indexnow.txt');
fs.writeFileSync(indexNowAliasFile, INDEXNOW_KEY, 'utf8');
console.log(`[SEO] Created IndexNow key verification files: ${INDEXNOW_KEY}.txt & indexnow.txt`);

// 2. Generate BingSiteAuth.xml for Bing Webmaster Tools
const bingAuthXml = `<?xml version="1.0"?>
<users>
	<user>589DBB2FA1D7159781CD8D9C03B0D238</user>
</users>
`;
fs.writeFileSync(path.join(DIST_DIR, 'BingSiteAuth.xml'), bingAuthXml, 'utf8');
console.log('[SEO] Created BingSiteAuth.xml');

// 3. Generate production-grade robots.txt
const robotsTxt = `# Robots.txt for Huliate (https://huliate.com)
# Evidence-Based Nutrition, High-Fiber Habits & Wholesome Meal Prep

User-agent: *
Allow: /

# Disallow internal WordPress administrative and development endpoints
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /wp-json/
Disallow: /xmlrpc.php
Disallow: /wp-login.php
Disallow: /wp-activate.php
Disallow: /wp-signup.php
Disallow: /comments/feed/
Disallow: */feed/

# Explicit search engine crawler permissions
User-agent: Googlebot
Allow: /

User-agent: Googlebot-Image
Allow: /

User-agent: Bingbot
Allow: /

User-agent: BingPreview
Allow: /

User-agent: DuckDuckBot
Allow: /

User-agent: Slurp
Allow: /

User-agent: Baiduspider
Allow: /

User-agent: YandexBot
Allow: /

# Sitemaps
Sitemap: ${TARGET_DOMAIN}/sitemap.xml

# Canonical Host
Host: ${TARGET_DOMAIN}
`;
fs.writeFileSync(path.join(DIST_DIR, 'robots.txt'), robotsTxt, 'utf8');
console.log('[SEO] Created robots.txt with Bingbot & Googlebot indexing rules');

// 4. Discover all legitimate public URLs for sitemap.xml
const today = new Date().toISOString().split('T')[0];

const coreArticles = [
  'gentle-gut-reset-fiber',
  '35g-daily-fiber-blueprint',
  '30g-protein-10g-fiber-breakfast-sequencing',
  'blood-sugar-balanced-plate',
  'cabbage-brassica-gut-health-bloating',
  'why-fiber-worsens-constipation-water-ratio',
  'resistant-starch-blood-sugar-gut',
  'low-fodmap-trap-microbiome-reintroduction',
  '3-2-1-meal-prep-formula',
  'meal-prep-soggy-ruined-component-method',
  'nutrient-dense-pantry-staples'
];

const staticPages = [
  'about',
  'contact',
  'newsletter',
  'meal-plans-cookbooks',
  'editorial-policy',
  'affiliate-disclosure',
  'privacy-policy',
  'terms'
];

const categoryPages = [
  'category/high-fiber-gut-health',
  'category/balanced-meals-prep',
  'category/food-science',
  'category/recipes',
  'category/meal-plans',
  'category/food-guides',
  'category/nutritious-ingredients',
  'category/nutrition-education',
  'category/reviews',
  'category/baking',
  'category/drinks',
  'category/how-its-made'
];

const sitemapEntries = [
  { loc: `${TARGET_DOMAIN}/`, priority: '1.0', changefreq: 'daily', lastmod: today },
  ...coreArticles.map(slug => ({
    loc: `${TARGET_DOMAIN}/${slug}/`,
    priority: '0.9',
    changefreq: 'weekly',
    lastmod: today
  })),
  ...categoryPages.map(cat => ({
    loc: `${TARGET_DOMAIN}/${cat}/`,
    priority: '0.7',
    changefreq: 'weekly',
    lastmod: today
  })),
  ...staticPages.map(page => ({
    loc: `${TARGET_DOMAIN}/${page}/`,
    priority: '0.6',
    changefreq: 'monthly',
    lastmod: today
  }))
];

let sitemapXml = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
`;

for (const entry of sitemapEntries) {
  sitemapXml += `  <url>
    <loc>${entry.loc}</loc>
    <lastmod>${entry.lastmod}</lastmod>
    <changefreq>${entry.changefreq}</changefreq>
    <priority>${entry.priority}</priority>
  </url>
`;
}
sitemapXml += `</urlset>\n`;

fs.writeFileSync(path.join(DIST_DIR, 'sitemap.xml'), sitemapXml, 'utf8');
console.log(`[SEO] Created sitemap.xml with ${sitemapEntries.length} canonical URLs`);

// 5. Enhance HTML files with SEO metadata, canonical links, robots tags, and social cards
function enhanceHtmlFile(filePath, routePath) {
  let content = fs.readFileSync(filePath, 'utf8');

  // Replace any lingering localhost mentions
  content = content.replaceAll('http://localhost:8885', TARGET_DOMAIN);
  content = content.replaceAll('http%3A%2F%2Flocalhost%3A8885', encodeURIComponent(TARGET_DOMAIN));

  const canonicalUrl = `${TARGET_DOMAIN}${routePath.endsWith('/') ? routePath : routePath + '/'}`;

  // Ensure canonical link exists
  if (!content.includes('rel="canonical"') && !content.includes("rel='canonical'")) {
    const canonicalTag = `\n<link rel="canonical" href="${canonicalUrl}" />`;
    content = content.replace('</head>', `${canonicalTag}\n</head>`);
  } else {
    content = content.replace(/<link rel=["']canonical["'][^>]*>/i, `<link rel="canonical" href="${canonicalUrl}" />`);
  }

  // Ensure meta robots allows indexing
  if (!content.includes('name="robots"') && !content.includes("name='robots'")) {
    const robotsMeta = `\n<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />`;
    content = content.replace('</head>', `${robotsMeta}\n</head>`);
  } else {
    // Enhance existing robots tag
    content = content.replace(/<meta name=['"]robots['"] content=['"][^'"]*['"]\s*\/?>/i,
      `<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />`);
  }

  // Fix relative Open Graph urls and images
  content = content.replace(/<meta property=["']og:url["'] content=["'](\/[^"']*)["']\s*\/?>/i, (m, p) => {
    return `<meta property="og:url" content="${TARGET_DOMAIN}${p}">`;
  });
  content = content.replace(/<meta property=["']og:image["'] content=["'](\/[^"']*)["']\s*\/?>/i, (m, p) => {
    return `<meta property="og:image" content="${TARGET_DOMAIN}${p}">`;
  });

  // Extract meta title & description for Twitter Cards if missing
  if (!content.includes('name="twitter:card"')) {
    const titleMatch = content.match(/<title>([^<]+)<\/title>/i);
    const descMatch = content.match(/<meta name=["']description["'] content=["']([^"']+)["']/i) ||
                      content.match(/<meta property=["']og:description["'] content=["']([^"']+)["']/i);
    const imgMatch = content.match(/<meta property=["']og:image["'] content=["']([^"']+)["']/i);

    const titleText = titleMatch ? titleMatch[1].trim() : 'Huliate';
    const descText = descMatch ? descMatch[1].trim() : 'Evidence-Based Nutrition & High-Fiber Meal Prep';
    const imgUrl = imgMatch ? imgMatch[1].trim() : `${TARGET_DOMAIN}/wp-content/uploads/2026/10/gentle-gut-reset-fiber-portrait.webp`;

    const twitterTags = `
<!-- Twitter Card Metadata -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="${titleText}">
<meta name="twitter:description" content="${descText}">
<meta name="twitter:image" content="${imgUrl}">
<!-- End Twitter Card Metadata -->`;
    content = content.replace('</head>', `${twitterTags}\n</head>`);
  }

  // If homepage, add WebSite structured data and search engine verification tags
  if (routePath === '/' || routePath === '') {
    if (!content.includes('msvalidate.01')) {
      const bingVerifyMeta = `\n<meta name="msvalidate.01" content="589DBB2FA1D7159781CD8D9C03B0D238" />`;
      content = content.replace('</head>', `${bingVerifyMeta}\n</head>`);
    }

    if (!content.includes('schema.org') || !content.includes('"@type":"WebSite"')) {
      const siteSchema = `
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "@id": "${TARGET_DOMAIN}/#website",
      "url": "${TARGET_DOMAIN}/",
      "name": "Huliate",
      "description": "Evidence-Based Nutrition, High-Fiber Habits & Wholesome Meal Prep",
      "inLanguage": "en-US",
      "publisher": {
        "@type": "Organization",
        "@id": "${TARGET_DOMAIN}/#organization",
        "name": "Huliate",
        "url": "${TARGET_DOMAIN}/"
      }
    },
    {
      "@type": "Organization",
      "@id": "${TARGET_DOMAIN}/#organization",
      "name": "Huliate",
      "url": "${TARGET_DOMAIN}/",
      "logo": {
        "@type": "ImageObject",
        "url": "${TARGET_DOMAIN}/wp-content/uploads/2026/10/gentle-gut-reset-fiber-portrait.webp"
      }
    }
  ]
}
</script>`;
      content = content.replace('</head>', `${siteSchema}\n</head>`);
    }
  }

  fs.writeFileSync(filePath, content, 'utf8');
}

// Enhance homepage
const homeFile = path.join(DIST_DIR, 'index.html');
if (fs.existsSync(homeFile)) {
  enhanceHtmlFile(homeFile, '/');
  console.log('[SEO] Enhanced homepage index.html with canonical, robots, and JSON-LD schema');
}

// Enhance articles and pages
for (const slug of coreArticles) {
  const articleFile = path.join(DIST_DIR, slug, 'index.html');
  if (fs.existsSync(articleFile)) {
    enhanceHtmlFile(articleFile, `/${slug}/`);
  }
}
console.log(`[SEO] Enhanced ${coreArticles.length} core article HTML files`);

for (const slug of staticPages) {
  const pageFile = path.join(DIST_DIR, slug, 'index.html');
  if (fs.existsSync(pageFile)) {
    enhanceHtmlFile(pageFile, `/${slug}/`);
  }
}
console.log(`[SEO] Enhanced ${staticPages.length} static page HTML files`);

for (const cat of categoryPages) {
  const catFile = path.join(DIST_DIR, cat, 'index.html');
  if (fs.existsSync(catFile)) {
    enhanceHtmlFile(catFile, `/${cat}/`);
  }
}
console.log(`[SEO] Enhanced ${categoryPages.length} category HTML files`);

console.log('--- SEO & Indexing Asset Generation Completed Successfully! ---');
