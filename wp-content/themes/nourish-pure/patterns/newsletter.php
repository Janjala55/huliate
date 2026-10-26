<?php
/**
 * Title: Nutritist High-Converting Newsletter & Lead Magnet
 * Slug: nourish-pure/newsletter
 * Categories: nourish-pure-monetize, layout
 * Description: Newsletter subscription box offering the 7-Day High-Fiber Grocery Checklist PDF.
 * Keywords: newsletter, subscribe, email, lead magnet, checklist
 */
?>
<!-- wp:group {"className":"np-newsletter-section-wrapper","layout":{"type":"default"}} -->
<section class="wp-block-group np-newsletter-section-wrapper">
	<div class="np-newsletter-container">
		<div class="np-newsletter-box">
			<div class="np-newsletter-content">
				<span class="np-newsletter-badge">Free Download &bull; Instant PDF</span>
				<h2 class="np-newsletter-title">Get The 7-Day High-Fiber Grocery Checklist</h2>
				<p class="np-newsletter-desc">
					Join 8,500+ readers across the US, UK, and Canada. Receive our 1-page printable supermarket shopping checklist, 3 quick 3-2-1 meal assembly formulas, and practical blood sugar science every Sunday morning.
				</p>

				<form class="np-newsletter-form" action="/newsletter/" method="get" onsubmit="event.preventDefault(); window.location.href='/newsletter/?subscribed=1';">
					<div class="np-newsletter-input-group">
						<input type="email" placeholder="Enter your email address..." class="np-newsletter-input" required />
						<button type="submit" class="np-btn-nutritist-primary np-newsletter-submit">
							<span>Get Free Checklist (PDF) &rarr;</span>
						</button>
					</div>
				</form>

				<div class="np-newsletter-guarantee">
					<span>🔒 100% Privacy guaranteed. Zero sponsored spam. One-click unsubscribe anytime.</span>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /wp:group -->
