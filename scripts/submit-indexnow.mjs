const TARGET_DOMAIN = 'https://huliate.com';
const HOST = 'huliate.com';
const INDEXNOW_KEY = 'f6c91a3e892d4f57a03bc5e243918b95';
const KEY_LOCATION = `${TARGET_DOMAIN}/${INDEXNOW_KEY}.txt`;

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
  'category/nutrition-education'
];

const urlList = [
  `${TARGET_DOMAIN}/`,
  ...coreArticles.map(slug => `${TARGET_DOMAIN}/${slug}/`),
  ...categoryPages.map(cat => `${TARGET_DOMAIN}/${cat}/`),
  ...staticPages.map(page => `${TARGET_DOMAIN}/${page}/`)
];

const payload = {
  host: HOST,
  key: INDEXNOW_KEY,
  keyLocation: KEY_LOCATION,
  urlList: urlList
};

console.log(`--- Submitting ${urlList.length} URLs to Bing & Search Engines via IndexNow ---`);
console.log(`Host: ${HOST}`);
console.log(`Key location: ${KEY_LOCATION}`);

const endpoints = [
  'https://api.indexnow.org/indexnow',
  'https://www.bing.com/indexnow'
];

for (const endpoint of endpoints) {
  try {
    console.log(`\nSubmitting to ${endpoint}...`);
    const res = await fetch(endpoint, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json; charset=utf-8'
      },
      body: JSON.stringify(payload)
    });

    console.log(`Status: ${res.status} ${res.statusText}`);
    const text = await res.text();
    if (text) {
      console.log(`Response: ${text}`);
    } else {
      if (res.status === 200) {
        console.log('✓ Success: All URLs submitted successfully to Bing/IndexNow!');
      } else if (res.status === 202) {
        console.log('✓ Accepted: URLs received, key verification in progress by Bing!');
      }
    }
  } catch (err) {
    console.error(`Error submitting to ${endpoint}:`, err.message);
  }
}
