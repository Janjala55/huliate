<?php
/**
 * Title: Featured Story & Nutritist Investigation Section
 * Slug: nourish-pure/featured-story
 * Categories: nourish-pure-editorial, featured
 * Description: Editorial investigation feature mimicking Nutritist's About / Nutrition Care section.
 * Keywords: featured, story, nutritist, fiber, gut health, investigation
 */
$story_img = content_url( '/uploads/2026/10/35g-daily-fiber-blueprint-portrait.jpg' );
?>
<!-- wp:group {"className":"np-story-section-wrapper","layout":{"type":"default"}} -->
<section class="wp-block-group np-story-section-wrapper">
	<div class="np-story-container">
		<div class="np-story-grid">
			<!-- Left Column: Story Visual Card -->
			<div class="np-story-visual-col">
				<div class="np-story-img-frame">
					<img src="<?php echo esc_url( $story_img ); ?>" alt="Whole Food Preparation &amp; Nutrition Science" class="np-story-img" width="540" height="640" loading="lazy" />
					<div class="np-story-floating-card">
						<span class="np-story-pill-highlight">Pillar Investigation</span>
						<h4>The 35g Daily Protocol</h4>
						<p>Validated by Harvard &amp; American Gastroenterological Guidelines</p>
					</div>
				</div>
			</div>

			<!-- Right Column: Narrative, Checklist & Retention Proof -->
			<div class="np-story-content-col">
				<div class="np-section-eyebrow">
					<span class="np-eyebrow-text">The Lead Story &bull; Evidence-Based Protocol</span>
				</div>

				<h2 class="np-story-title">
					Why 90% Of Adults Are Fiber-Deficient <br class="np-desktop-br" />
					<span class="np-story-title-highlight">(And The Sunday Routine That Heals It)</span>
				</h2>

				<p class="np-story-lead">
					According to NHANES surveillance data across the US and UK, the average adult consumes barely <strong>14g of dietary fiber daily</strong>—less than half the clinical threshold for a resilient gut microbiome and stable metabolic health.
				</p>

				<p class="np-story-body">
					Yet when people try to fix this overnight with harsh raw roughage and chalky powder supplements, they end up doubled over with gas and severe bloating. In this lead investigation, we break down how switching to <em>gentle cooked soluble fibers</em> (chia, brown lentils, sweet potatoes, and oats) calms gut motility within 7 days while keeping blood sugar completely flat.
				</p>

				<!-- Nutritist 2-Column Checklist Matrix -->
				<div class="np-checklist-grid">
					<div class="np-checklist-col">
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">Prebiotic Soluble Fiber Sources</span>
						</div>
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">The 3-2-1 Sunday Batch Cooking System</span>
						</div>
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">Glucose Curve Flattening (Eat Fiber First)</span>
						</div>
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">15-Minute Workday Lunch Assembly</span>
						</div>
					</div>

					<div class="np-checklist-col">
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">Gentle Digestive Motility Protocols</span>
						</div>
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">Zero Costly Powder Supplements</span>
						</div>
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">Nutrient-Dense Pantry Food Swaps</span>
						</div>
						<div class="np-check-item">
							<span class="np-check-icon">✓</span>
							<span class="np-check-text">5-Hour Post-Meal Satiety &amp; Focus</span>
						</div>
					</div>
				</div>

				<!-- Nutritist 3 Feature Badges Row -->
				<div class="np-story-badges-row">
					<div class="np-mini-feature-box">
						<span class="np-feature-icon">👨‍⚕️</span>
						<div class="np-feature-info">
							<strong>Nutritionist Reviewed</strong>
							<small>Evidence-Backed Data</small>
						</div>
					</div>

					<div class="np-mini-feature-box">
						<span class="np-feature-icon">⏱️</span>
						<div class="np-feature-info">
							<strong>8-Min Read</strong>
							<small>Includes Meal Table</small>
						</div>
					</div>

					<div class="np-mini-feature-box">
						<span class="np-feature-icon">📋</span>
						<div class="np-feature-info">
							<strong>Printable PDF</strong>
							<small>Grocery List Included</small>
						</div>
					</div>
				</div>

				<!-- Read Story CTA -->
				<div class="np-story-cta-wrap">
					<a href="/gentle-gut-reset-fiber/" class="np-btn-nutritist-primary">
						<span>Read The Full Story &amp; Protocol &rarr;</span>
					</a>
					<a href="/35g-daily-fiber-blueprint/" class="np-story-text-link">
						Or view the 10 High-Fiber Foods list &rarr;
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /wp:group -->
