<?php
/**
 * Title: Nutritist Hero & 1-Second Retention Hook
 * Slug: nourish-pure/nutritist-hero
 * Categories: nourish-pure-editorial, featured
 * Description: Premium Nutritist-style hero section with 1-second retention metrics and floating badges.
 * Keywords: hero, nutritist, nutrition, retention, meal prep, fiber
 */
$hero_img = content_url( '/uploads/2026/10/gentle-gut-reset-fiber-portrait.jpg' );
?>
<!-- wp:group {"className":"np-nutritist-hero-wrapper","layout":{"type":"default"}} -->
<div class="wp-block-group np-nutritist-hero-wrapper">
	<div class="np-hero-container">
		<div class="np-hero-grid">
			<!-- Left Column: Copy & Retention CTAs -->
			<div class="np-hero-content-col">
				<div class="np-hero-eyebrow-badge">
					<span class="np-badge-dot"></span>
					<span>🌱 Evidence-Based Nutrition &amp; Gut Health</span>
				</div>

				<h1 class="np-hero-title">
					Eat Whole, Feel Light: <br class="np-desktop-br" />
					<span class="np-title-accent">Evidence-Based Nutrition</span> For Everyday Life
				</h1>

				<p class="np-hero-lead">
					Say goodbye to extreme diet rules, digestive bloating, and the dreaded 3 PM energy crash. We translate clinical gut microbiome research into simple <strong>35g daily fiber formulas</strong>, 15-minute meal prep routines, and blood sugar science that fit real life.
				</p>

				<!-- Nutritist Double CTA Button Row -->
				<div class="np-hero-actions-row">
					<a href="/gentle-gut-reset-fiber/" class="np-btn-nutritist-primary">
						<span>Read The Gut Reset Protocol</span>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
					</a>
					<a href="/35g-daily-fiber-blueprint/" class="np-btn-nutritist-secondary">
						<span>Explore 35g Fiber Blueprint</span>
					</a>
				</div>

				<!-- 1-Second Retention Trust Row -->
				<div class="np-hero-trust-bar">
					<div class="np-trust-item">
						<span class="np-trust-stars">★★★★★</span>
						<span class="np-trust-text"><strong>4.9/5 Rating</strong> (1,200+ Readers)</span>
					</div>
					<span class="np-trust-divider" aria-hidden="true">•</span>
					<div class="np-trust-item">
						<span class="np-trust-text">🥗 100% Whole Food</span>
					</div>
					<span class="np-trust-divider" aria-hidden="true">•</span>
					<div class="np-trust-item">
						<span class="np-trust-text">🚫 Zero Crash Diets</span>
					</div>
				</div>
			</div>

			<!-- Right Column: Visual Card with Nutritist Floating Chips -->
			<div class="np-hero-visual-col">
				<div class="np-hero-card-stack">
					<!-- Main Visual -->
					<div class="np-hero-img-frame">
						<img src="<?php echo esc_url( $hero_img ); ?>" alt="Wholesome Prebiotic Broth &amp; Vegetables" class="np-hero-main-img" width="560" height="680" loading="eager" />
						<div class="np-hero-img-gradient"></div>
					</div>

					<!-- Floating Pill Chip 1 (Top Left) -->
					<div class="np-floating-chip np-chip-top">
						<span class="np-chip-icon">🥑</span>
						<div class="np-chip-body">
							<strong>35g Daily Fiber</strong>
							<small>Prebiotic Gut Fuel</small>
						</div>
					</div>

					<!-- Floating Pill Chip 2 (Bottom Right) -->
					<div class="np-floating-chip np-chip-bottom">
						<span class="np-chip-icon">⚡</span>
						<div class="np-chip-body">
							<strong>Zero 3 PM Slumps</strong>
							<small>Balanced Blood Sugar</small>
						</div>
					</div>

					<!-- Floating Mini Badge (Top Right) -->
					<div class="np-floating-badge-pill">
						<span>Harvard &amp; AGA Aligned</span>
					</div>
				</div>
			</div>
		</div>

		<!-- 1-Second Retention Strip (What Readers Solve in 30 Days) -->
		<div class="np-retention-strip">
			<div class="np-retention-card">
				<div class="np-retention-icon-box">🌿</div>
				<div class="np-retention-text">
					<h2 class="np-retention-card-title">Debloat &amp; Heal Your Gut</h2>
					<p class="np-retention-card-desc">How 35g of soluble prebiotic fiber calms digestive distension within 7 days.</p>
					<a href="/35g-daily-fiber-blueprint/" class="np-retention-link">Read Blueprint &rarr;</a>
				</div>
			</div>

			<div class="np-retention-card">
				<div class="np-retention-icon-box">🥗</div>
				<div class="np-retention-text">
					<h2 class="np-retention-card-title">The 3-2-1 Sunday Prep</h2>
					<p class="np-retention-card-desc">Cook once in 60 minutes. Enjoy 5 balanced 15-minute weekday lunches without food waste.</p>
					<a href="/3-2-1-meal-prep-formula/" class="np-retention-link">See Formula &rarr;</a>
				</div>
			</div>

			<div class="np-retention-card">
				<div class="np-retention-icon-box">📉</div>
				<div class="np-retention-text">
					<h2 class="np-retention-card-title">Steady Blood Sugar Curves</h2>
					<p class="np-retention-card-desc">Eat fiber &amp; protein first to blunt glucose spikes by up to 35% and stop the 3 PM crash.</p>
					<a href="/blood-sugar-balanced-plate/" class="np-retention-link">Learn Plating &rarr;</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /wp:group -->
