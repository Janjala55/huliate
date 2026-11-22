import os

home_path = r"D:\workspace\huliate\dist\index.html"
with open(home_path, "r", encoding="utf-8") as f:
    content = f.read()

new_cards = """<li class="wp-block-post post-301 post type-post status-publish format-standard has-post-thumbnail hentry category-high-fiber-gut-health">
				<div class="wp-block-group np-article-card-nutritist">
					<div class="np-card-thumb-wrap is-layout-flow wp-block-group-is-layout-flow">
						<figure class="wp-block-post-featured-image"><a href="/50g-fiber-daily-meal-plan/" target="_self" ><img width="1200" height="675" src="/wp-content/uploads/2026/10/50g-fiber-daily-meal-plan-1200x675.webp" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="High-fiber daily meal spread featuring French green lentils, chia seeds, roasted cruciferous vegetables, and avocado" style="aspect-ratio:16/10;width:100%;object-fit:cover;" decoding="async" loading="lazy" /></a></figure>
					</div>
					<div class="np-card-content-wrap">
						<div style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.06em" class="taxonomy-category wp-block-post-terms has-text-color has-primary-accent-color"><a href="/category/high-fiber-gut-health/" rel="tag">High-Fiber &amp; Gut Health</a></div>
						<h3 style="font-size:clamp(0.875rem, 0.875rem + ((1vw - 0.2rem) * 0.591), 1.2rem);font-family:var(--wp--preset--font-family--serif);line-height:1.35;margin-top:0.45rem;margin-bottom:0.65rem" class="wp-block-post-title"><a href="/50g-fiber-daily-meal-plan/" target="_self" >The 50g Fiber Daily Plan: A Realistic Meal-by-Meal Protocol Without Bloating</a></h3>
						<div style="font-size:0.875rem;line-height:1.55" class="wp-block-post-excerpt has-text-color has-secondary-text-color"><p class="wp-block-post-excerpt__excerpt">Most adults struggle to hit 15g of fiber daily, yet clinical research indicates 45-50g optimizes microbial short-chain fatty acid synthesis. Here is the exact meal-by-meal protocol and gentle soluble fiber staging to reach 50g without digestive distress. </p></div>
						<div class="np-card-meta-bottom">
							<div style="font-size:0.75rem" class="wp-block-post-date has-text-color has-secondary-text-color"><time datetime="2026-11-22T08:00:00+00:00">November 22, 2026</time></div>
							<span class="np-meta-separator" aria-hidden="true">&bull;</span>
							<p>							<span class="np-reading-time-badge" aria-label="Estimated reading time"><svg class="np-clock-icon" aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>6 min read</span></p>
						</div>
					</div>
				</div>
			</li><li class="wp-block-post post-302 post type-post status-publish format-standard has-post-thumbnail hentry category-food-science">
				<div class="wp-block-group np-article-card-nutritist">
					<div class="np-card-thumb-wrap is-layout-flow wp-block-group-is-layout-flow">
						<figure class="wp-block-post-featured-image"><a href="/protein-pacing-glucose-curves-meal-order/" target="_self" ><img width="1200" height="675" src="/wp-content/uploads/2026/10/protein-pacing-glucose-curves-meal-order-1200x675.webp" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="Three-step meal sequencing spread showing bitter green salad starter, seared salmon, and roasted sweet potatoes" style="aspect-ratio:16/10;width:100%;object-fit:cover;" decoding="async" loading="lazy" /></a></figure>
					</div>
					<div class="np-card-content-wrap">
						<div style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.06em" class="taxonomy-category wp-block-post-terms has-text-color has-primary-accent-color"><a href="/category/food-science/" rel="tag">Food Science &amp; Digestion</a></div>
						<h3 style="font-size:clamp(0.875rem, 0.875rem + ((1vw - 0.2rem) * 0.591), 1.2rem);font-family:var(--wp--preset--font-family--serif);line-height:1.35;margin-top:0.45rem;margin-bottom:0.65rem" class="wp-block-post-title"><a href="/protein-pacing-glucose-curves-meal-order/" target="_self" >Protein Pacing &amp; Meal Sequencing: Why Food Order Prevents Afternoon Blood Sugar Crashes</a></h3>
						<div style="font-size:0.875rem;line-height:1.55" class="wp-block-post-excerpt has-text-color has-secondary-text-color"><p class="wp-block-post-excerpt__excerpt">Consuming the exact same meal in a different order—fiber starters first, protein and healthy fats second, carbohydrates last—reduces postprandial glucose excursions by up to 73%. Explore the gastrointestinal endocrinology behind meal sequencing. </p></div>
						<div class="np-card-meta-bottom">
							<div style="font-size:0.75rem" class="wp-block-post-date has-text-color has-secondary-text-color"><time datetime="2026-11-22T08:00:00+00:00">November 22, 2026</time></div>
							<span class="np-meta-separator" aria-hidden="true">&bull;</span>
							<p>							<span class="np-reading-time-badge" aria-label="Estimated reading time"><svg class="np-clock-icon" aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>5 min read</span></p>
						</div>
					</div>
				</div>
			</li><li class="wp-block-post post-303 post type-post status-publish format-standard has-post-thumbnail hentry category-food-science">
				<div class="wp-block-group np-article-card-nutritist">
					<div class="np-card-thumb-wrap is-layout-flow wp-block-group-is-layout-flow">
						<figure class="wp-block-post-featured-image"><a href="/sourdough-fermentation-gut-health-fructans/" target="_self" ><img width="1200" height="675" src="/wp-content/uploads/2026/10/sourdough-hydration-1200x675.webp" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="High hydration artisanal sourdough bread loaf showing open airy crumb and crisp blistered crust" style="aspect-ratio:16/10;width:100%;object-fit:cover;" decoding="async" loading="lazy" /></a></figure>
					</div>
					<div class="np-card-content-wrap">
						<div style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.06em" class="taxonomy-category wp-block-post-terms has-text-color has-primary-accent-color"><a href="/category/food-science/" rel="tag">Food Science &amp; Digestion</a></div>
						<h3 style="font-size:clamp(0.875rem, 0.875rem + ((1vw - 0.2rem) * 0.591), 1.2rem);font-family:var(--wp--preset--font-family--serif);line-height:1.35;margin-top:0.45rem;margin-bottom:0.65rem" class="wp-block-post-title"><a href="/sourdough-fermentation-gut-health-fructans/" target="_self" >Sourdough Fermentation &amp; Gut Health: How Wild Yeast and Slow Hydration Neutralize Fructans</a></h3>
						<div style="font-size:0.875rem;line-height:1.55" class="wp-block-post-excerpt has-text-color has-secondary-text-color"><p class="wp-block-post-excerpt__excerpt">Millions avoid bread due to post-meal sluggishness and bloating, mistakenly blaming gluten. In reality, fermentable fructans and phytic acid are the primary triggers. Discover the biochemistry of 24-hour lactic acid fermentation. </p></div>
						<div class="np-card-meta-bottom">
							<div style="font-size:0.75rem" class="wp-block-post-date has-text-color has-secondary-text-color"><time datetime="2026-11-22T08:00:00+00:00">November 22, 2026</time></div>
							<span class="np-meta-separator" aria-hidden="true">&bull;</span>
							<p>							<span class="np-reading-time-badge" aria-label="Estimated reading time"><svg class="np-clock-icon" aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>6 min read</span></p>
						</div>
					</div>
				</div>
			</li>"""

target = '<ul class="columns-3 wp-block-post-template is-layout-grid wp-container-core-post-template-is-layout-cda6dc4f wp-block-post-template-is-layout-grid">'
if target in content and "50g-fiber-daily-meal-plan" not in content:
    content = content.replace(target, f"{target}{new_cards}")
    with open(home_path, "w", encoding="utf-8") as f:
        f.write(content)
    print("Homepage updated with 3 new launch articles!")
else:
    print("Already present or target not found.")
