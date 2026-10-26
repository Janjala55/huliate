<?php
/**
 * Title: Nutritist Signature Dishes & Formulas
 * Slug: nourish-pure/signature-dishes
 * Categories: nourish-pure-recipes, layout
 * Description: Special dishes and formulas section mimicking Nutritist's Special Dish grid.
 * Keywords: dishes, nutritist, recipes, formulas, meal prep
 */
$dish_1_img = content_url( '/uploads/2026/10/gentle-gut-reset-fiber.jpg' );
$dish_2_img = content_url( '/uploads/2026/10/3-2-1-meal-prep-formula.jpg' );
?>
<!-- wp:group {"className":"np-dishes-section-wrapper","layout":{"type":"default"}} -->
<section class="wp-block-group np-dishes-section-wrapper">
	<div class="np-dishes-container">
		<div class="np-dishes-header-row">
			<div class="np-dishes-header-left">
				<span class="np-eyebrow-text">Our Wholesome Formulas</span>
				<h2 class="np-section-heading">Nutrient-Dense Meals Designed For Satiety</h2>
				<p class="np-dishes-subheading">Every plate follows our golden balance: 10g+ prebiotic fiber, 20g+ complete protein, and wholesome fats.</p>
			</div>
			<div class="np-dishes-header-right">
				<a href="/category/balanced-meals-prep/" class="np-btn-nutritist-secondary">
					<span>Browse All Meal Formulas &rarr;</span>
				</a>
			</div>
		</div>

		<div class="np-dishes-grid">
			<!-- Dish Card 1 -->
			<div class="np-dish-card">
				<div class="np-dish-thumb-frame">
					<img src="<?php echo esc_url( $dish_1_img ); ?>" alt="Slow-Simmered Lentil &amp; Roasted Fennel Broth" class="np-dish-img" width="400" height="260" loading="lazy" />
					<span class="np-dish-price-badge">⏱️ 25 Mins</span>
				</div>
				<div class="np-dish-body">
					<div class="np-dish-macros">
						<span class="np-macro-pill">🥑 16g Fiber</span>
						<span class="np-macro-pill">🌱 Gut Soothing</span>
					</div>
					<h3 class="np-dish-title">Slow-Simmered Lentil &amp; Roasted Fennel Broth</h3>
					<p class="np-dish-desc">Slow-cooked prebiotic broth with golden turmeric, crushed fennel seed, and tender brown lentils. Gentle on sensitive stomachs.</p>
					<a href="/35g-daily-fiber-blueprint/" class="np-dish-link">Read Prep Blueprint &rarr;</a>
				</div>
			</div>

			<!-- Dish Card 2 -->
			<div class="np-dish-card">
				<div class="np-dish-thumb-frame">
					<img src="<?php echo esc_url( $dish_2_img ); ?>" alt="3-2-1 Mediterranean Quinoa &amp; Chickpea Bowl" class="np-dish-img" width="400" height="260" loading="lazy" />
					<span class="np-dish-price-badge">⏱️ 15 Mins</span>
				</div>
				<div class="np-dish-body">
					<div class="np-dish-macros">
						<span class="np-macro-pill">🥑 14g Fiber</span>
						<span class="np-macro-pill">⚡ 22g Protein</span>
					</div>
					<h3 class="np-dish-title">The 3-2-1 Mediterranean Quinoa Bowl</h3>
					<p class="np-dish-desc">Crisp cucumbers, roasted chickpeas, kalamata olives, and steamed greens tossed in a lemon-tahini vinaigrette. 15-minute assembly.</p>
					<a href="/3-2-1-meal-prep-formula/" class="np-dish-link">Read Prep Blueprint &rarr;</a>
				</div>
			</div>

			<!-- Dish Card 3: Featured Editorial Template (Nutritist Highlight Card) -->
			<div class="np-dish-promo-card">
				<div class="np-promo-card-badge">FREE &bull; EDITORIAL TEMPLATE</div>
				<div class="np-promo-price-wrap">
					<span class="np-promo-price-small">Printable PDF</span>
					<div class="np-promo-price-tag">Free</div>
				</div>
				<h3 class="np-promo-title">The 7-Day High-Fiber Meal Planner &amp; Prep Matrix</h3>
				<p class="np-promo-desc">
					Our complete weekly kitchen framework: 35g fiber daily tracking sheet, supermarket produce checklist, and 60-minute Sunday batch schedule.
				</p>
				<ul class="np-promo-checklist">
					<li>✓ Printable 7-day meal schedule</li>
					<li>✓ Categorized supermarket shopping checklist</li>
					<li>✓ 60-min Sunday batch prep workflow</li>
				</ul>
				<a href="/newsletter/" class="np-btn-nutritist-primary np-btn-full">
					<span>Download Free Planner (PDF) &rarr;</span>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- /wp:group -->
