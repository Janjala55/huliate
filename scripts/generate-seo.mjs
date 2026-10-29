import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const SITE_ROOT = path.resolve(__dirname, '..');
const DIST_DIR = path.resolve(SITE_ROOT, 'dist');
const TARGET_DOMAIN = 'https://huliate.com';
const INDEXNOW_KEY = 'f6c91a3e892d4f57a03bc5e243918b95';

console.log('=== Huliate Full SEO, Ranking & Search Indexing Engine ===');

if (!fs.existsSync(DIST_DIR)) {
  fs.mkdirSync(DIST_DIR, { recursive: true });
}

// 1. IndexNow Verification Files (Bing & Yandex)
fs.writeFileSync(path.join(DIST_DIR, `${INDEXNOW_KEY}.txt`), INDEXNOW_KEY, 'utf8');
fs.writeFileSync(path.join(DIST_DIR, 'indexnow.txt'), INDEXNOW_KEY, 'utf8');
console.log(`[IndexNow] Key files created: ${INDEXNOW_KEY}.txt & indexnow.txt`);

// 2. BingSiteAuth.xml (Bing Webmaster Tools XML verification)
const bingAuthXml = `<?xml version="1.0"?>
<users>
	<user>589DBB2FA1D7159781CD8D9C03B0D238</user>
</users>
`;
fs.writeFileSync(path.join(DIST_DIR, 'BingSiteAuth.xml'), bingAuthXml, 'utf8');
console.log('[Bing] BingSiteAuth.xml verification file created');

// 3. Robots.txt (Comprehensive Search Engine & Bot Policy)
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

# Explicit search engine crawler allowances
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

# Primary XML Sitemap for Google & Bing
Sitemap: ${TARGET_DOMAIN}/sitemap.xml

# Canonical Host
Host: ${TARGET_DOMAIN}
`;
fs.writeFileSync(path.join(DIST_DIR, 'robots.txt'), robotsTxt, 'utf8');
console.log('[Robots] robots.txt created with full crawler access');

// 4. Articles metadata map
const articleData = {
  'gentle-gut-reset-fiber': {
    title: 'The Gentle 7-Day Gut Reset: Ramp Up Fiber Without Discomfort',
    category: 'High-Fiber & Gut Health',
    catSlug: 'high-fiber-gut-health',
    image: 'gentle-gut-reset-fiber-1024x572.webp'
  },
  '35g-daily-fiber-blueprint': {
    title: 'The 35g Daily Fiber Blueprint: 10 High-Fiber Foods That Keep You Full Without Bloating',
    category: 'High-Fiber & Gut Health',
    catSlug: 'high-fiber-gut-health',
    image: '35g-daily-fiber-blueprint-1024x572.webp'
  },
  '30g-protein-10g-fiber-breakfast-sequencing': {
    title: '30g Protein + 10g Fiber Breakfasts: Sequencing Your Morning for Stable All-Day Glucose',
    category: 'Balanced Meals & Prep',
    catSlug: 'balanced-meals-prep',
    image: '30g-protein-10g-fiber-breakfast-sequencing-1024x572.webp'
  },
  'blood-sugar-balanced-plate': {
    title: 'The Blood Sugar Balanced Plate: How to Build Every Meal for Steady Energy',
    category: 'Balanced Meals & Prep',
    catSlug: 'balanced-meals-prep',
    image: 'blood-sugar-balanced-plate-1024x572.webp'
  },
  'cabbage-brassica-gut-health-bloating': {
    title: 'Cabbage & Brassicas: Cooking Methods That Maximize Gut Benefits While Minimizing Bloat',
    category: 'Food Science & Digestion',
    catSlug: 'food-science',
    image: 'cabbage-brassica-gut-health-bloating-1024x572.webp'
  },
  'why-fiber-worsens-constipation-water-ratio': {
    title: 'Why More Fiber Can Make Constipation Worse: The Water-to-Bulk Ratio Explained',
    category: 'Food Science & Digestion',
    catSlug: 'food-science',
    image: 'why-fiber-worsens-constipation-water-ratio-1024x572.webp'
  },
  'resistant-starch-blood-sugar-gut': {
    title: 'Resistant Starch 101: How Cooked and Cooled Carbs Lower Blood Sugar Spikes and Feed Good Gut Bacteria',
    category: 'Food Science & Digestion',
    catSlug: 'food-science',
    image: 'resistant-starch-blood-sugar-gut-1024x572.webp'
  },
  'low-fodmap-trap-microbiome-reintroduction': {
    title: 'The Low-FODMAP Trap: Why Long-Term Elimination Starves Your Microbiome and How to Reintroduce Foods',
    category: 'Food Science & Digestion',
    catSlug: 'food-science',
    image: 'low-fodmap-trap-microbiome-reintroduction-1024x572.webp'
  },
  '3-2-1-meal-prep-formula': {
    title: 'The 3-2-1 Meal Prep Formula: 3 Proteins, 2 Carbs, 1 Sauce for Endless Combinations',
    category: 'Balanced Meals & Prep',
    catSlug: 'balanced-meals-prep',
    image: '3-2-1-meal-prep-formula-1024x572.webp'
  },
  'meal-prep-soggy-ruined-component-method': {
    title: 'Why Your Meal Prep Gets Soggy and Ruined by Day 3: The Component Method Fix',
    category: 'Balanced Meals & Prep',
    catSlug: 'balanced-meals-prep',
    image: 'meal-prep-soggy-ruined-component-method-1024x572.webp'
  },
  'nutrient-dense-pantry-staples': {
    title: '12 Nutrient-Dense Pantry Staples That Turn Any Random Dinner Into a Balanced Meal',
    category: 'Balanced Meals & Prep',
    catSlug: 'balanced-meals-prep',
    image: 'nutrient-dense-pantry-staples-1024x572.webp'
  }
};

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

const today = new Date().toISOString().split('T')[0];

// 5. XML Sitemap with Image Sitemap Extensions (Google & Bing Best Practice)
let sitemapXml = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <url>
    <loc>${TARGET_DOMAIN}/</loc>
    <lastmod>${today}</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
`;

for (const [slug, meta] of Object.entries(articleData)) {
  sitemapXml += `  <url>
    <loc>${TARGET_DOMAIN}/${slug}/</loc>
    <lastmod>${today}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
    <image:image>
      <image:loc>${TARGET_DOMAIN}/wp-content/uploads/2026/10/${meta.image}</image:loc>
      <image:title>${meta.title.replace(/&/g, '&amp;')}</image:title>
    </image:image>
  </url>
`;
}

for (const cat of categoryPages) {
  sitemapXml += `  <url>
    <loc>${TARGET_DOMAIN}/${cat}/</loc>
    <lastmod>${today}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.7</priority>
  </url>
`;
}

for (const page of staticPages) {
  sitemapXml += `  <url>
    <loc>${TARGET_DOMAIN}/${page}/</loc>
    <lastmod>${today}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>
`;
}
sitemapXml += `</urlset>\n`;

fs.writeFileSync(path.join(DIST_DIR, 'sitemap.xml'), sitemapXml, 'utf8');
console.log(`[Sitemap] sitemap.xml created with image metadata for Google & Bing Image Search`);

// 6. Clean RSS Feed for Search Engine Feed Crawlers
const feedFile = path.join(DIST_DIR, 'feed', 'index.html');
if (fs.existsSync(feedFile)) {
  let feedXml = fs.readFileSync(feedFile, 'utf8');
  feedXml = feedXml.replaceAll('<link></link>', `<link>${TARGET_DOMAIN}</link>`);
  feedXml = feedXml.replaceAll('<atom:link href="/feed/"', `<atom:link href="${TARGET_DOMAIN}/feed/"`);
  feedXml = feedXml.replaceAll('http://localhost:8885', TARGET_DOMAIN);
  feedXml = feedXml.replaceAll('http%3A%2F%2Flocalhost%3A8885', encodeURIComponent(TARGET_DOMAIN));

  // Fix relative item links
  for (const slug of Object.keys(articleData)) {
    feedXml = feedXml.replaceAll(`<link>/${slug}/</link>`, `<link>${TARGET_DOMAIN}/${slug}/</link>`);
    feedXml = feedXml.replaceAll(`<guid isPermaLink="false">/${slug}/</guid>`, `<guid isPermaLink="true">${TARGET_DOMAIN}/${slug}/</guid>`);
  }
  fs.writeFileSync(feedFile, feedXml, 'utf8');
  console.log('[RSS] Repaired /feed/ URLs to full absolute canonical links');
}

// 7. Cloudflare Pages _headers Optimization
const headersFile = path.join(DIST_DIR, '_headers');
const headersContent = `/*
  Strict-Transport-Security: max-age=31536000; includeSubDomains; preload
  X-Content-Type-Options: nosniff
  X-Frame-Options: SAMEORIGIN
  Referrer-Policy: strict-origin-when-cross-origin
  Cross-Origin-Opener-Policy: same-origin
  Permissions-Policy: camera=(), microphone=(), geolocation=()

/sitemap.xml
  Content-Type: application/xml; charset=utf-8
  Cache-Control: public, max-age=3600

/robots.txt
  Content-Type: text/plain; charset=utf-8
  Cache-Control: public, max-age=3600

/BingSiteAuth.xml
  Content-Type: application/xml; charset=utf-8
  Cache-Control: public, max-age=3600

/*.txt
  Content-Type: text/plain; charset=utf-8
  Cache-Control: public, max-age=3600

/feed/*
  Content-Type: application/rss+xml; charset=utf-8
  Cache-Control: public, max-age=3600

/wp-content/*
  Cache-Control: public, max-age=31536000, immutable

/assets/*
  Cache-Control: public, max-age=31536000, immutable
`;
fs.writeFileSync(headersFile, headersContent, 'utf8');
console.log('[Headers] Updated Cloudflare _headers for optimal search bot caching and MIME types');

// 8. Enhance HTML files with BreadcrumbList & Article Schemas
for (const [slug, meta] of Object.entries(articleData)) {
  const filePath = path.join(DIST_DIR, slug, 'index.html');
  if (!fs.existsSync(filePath)) continue;

  let content = fs.readFileSync(filePath, 'utf8');
  const canonicalUrl = `${TARGET_DOMAIN}/${slug}/`;

  // BreadcrumbList JSON-LD
  const breadcrumbJson = {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": `${TARGET_DOMAIN}/`
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": meta.category,
        "item": `${TARGET_DOMAIN}/category/${meta.catSlug}/`
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": meta.title,
        "item": canonicalUrl
      }
    ]
  };

  // Article JSON-LD
  const descMatch = content.match(/<meta property=["']og:description["'] content=["']([^"']+)["']/i) ||
                    content.match(/<meta name=["']description["'] content=["']([^"']+)["']/i);
  const descText = descMatch ? descMatch[1] : meta.title;

  const articleJson = {
    "@context": "https://schema.org",
    "@type": "Article",
    "@id": `${canonicalUrl}#article`,
    "isPartOf": {
      "@type": "WebSite",
      "@id": `${TARGET_DOMAIN}/#website`,
      "name": "Huliate",
      "url": `${TARGET_DOMAIN}/`
    },
    "headline": meta.title,
    "description": descText,
    "image": `${TARGET_DOMAIN}/wp-content/uploads/2026/10/${meta.image}`,
    "mainEntityOfPage": canonicalUrl,
    "inLanguage": "en-US",
    "author": {
      "@type": "Organization",
      "@id": `${TARGET_DOMAIN}/#organization`,
      "name": "Huliate Nutrition Science Team",
      "url": `${TARGET_DOMAIN}/about/`
    },
    "publisher": {
      "@type": "Organization",
      "@id": `${TARGET_DOMAIN}/#organization`,
      "name": "Huliate",
      "url": `${TARGET_DOMAIN}/`,
      "logo": {
        "@type": "ImageObject",
        "url": `${TARGET_DOMAIN}/wp-content/uploads/2026/10/gentle-gut-reset-fiber-portrait.webp`
      }
    }
  };

  // Inject BreadcrumbList if not present
  if (!content.includes('"@type": "BreadcrumbList"') && !content.includes('"@type":"BreadcrumbList"')) {
    const breadcrumbTag = `\n<script type="application/ld+json" id="huliate-breadcrumbs">\n${JSON.stringify(breadcrumbJson, null, 2)}\n</script>`;
    content = content.replace('</head>', `${breadcrumbTag}\n</head>`);
  }

  // Inject Article if not present
  if (!content.includes('"@type": "Article"') && !content.includes('"@type":"Article"')) {
    const articleTag = `\n<script type="application/ld+json" id="huliate-article-schema">\n${JSON.stringify(articleJson, null, 2)}\n</script>`;
    content = content.replace('</head>', `${articleTag}\n</head>`);
  }

  fs.writeFileSync(filePath, content, 'utf8');
}
console.log('[Schema] Injected BreadcrumbList and Article structured data into all 11 articles');

console.log('=== All SEO, Ranking & Verification Assets Successfully Synchronized ===');
