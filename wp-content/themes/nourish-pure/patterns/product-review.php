<?php
/**
 * Title: Editorial Product Review Box
 * Slug: nourish-pure/product-review
 * Categories: nourish-pure-reviews
 * Description: Editorial review card with summary, pros/cons comparison, author notes, and disclosure.
 * Keywords: review, product, equipment, pros, cons, test
 */
?>
<!-- wp:group {"className":"np-review-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group np-review-box">
	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","alignItems":"center"},"style":{"spacing":{"margin":{"bottom":"1rem"},"padding":{"bottom":"0.75rem"},"border":{"bottom":{"color":"var(--wp--preset--color--border)","width":"1px"}}}}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-width:1px;margin-bottom:1rem;padding-bottom:0.75rem">
		<div>
			<span style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--wp--preset--color--primary-accent)">Kitchen Lab Testing</span>
			<h3 style="margin:0.25rem 0 0;font-family:var(--wp--preset--font-family--serif);font-size:1.75rem">AeroPress Original Coffee Maker</h3>
		</div>
		<div style="text-align:right">
			<span style="display:block;font-size:0.75rem;text-transform:uppercase;color:var(--wp--preset--color--secondary-text)">Tested By Editorial Team</span>
			<strong style="font-size:1.125rem;color:var(--wp--preset--color--contrast)">Approx. $39.95</strong>
		</div>
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.65"}}} -->
	<p><strong>Our Verdict:</strong> After four months of daily testing with light-roast Ethiopian and medium-roast Colombian coffees, the AeroPress remains the benchmark for home coffee enthusiasts seeking low acidity, complete extraction control, and virtually indestructible build quality.</p>
	<!-- /wp:paragraph -->

	<div class="np-pros-cons-grid">
		<div class="np-pros-card">
			<h4>✓ Strengths</h4>
			<ul>
				<li>Exceptional clarity of cup with zero sediment when using standard micro-filters</li>
				<li>Brew cycle completed in under 2 minutes with effortless cleanup</li>
				<li>Compact footprint and durable food-grade copolyester construction</li>
				<li>Highly forgiving for experimental grind sizes and water temperatures</li>
			</ul>
		</div>

		<div class="np-cons-card">
			<h4>✕ Considerations</h4>
			<ul>
				<li>Maximum single brew volume is limited to 1–2 cups at a time</li>
				<li>Requires recurring paper micro-filters unless paired with an aftermarket metal disk</li>
				<li>Aesthetic is utilitarian rather than elegant countertop display</li>
			</ul>
		</div>
	</div>

	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","alignItems":"center"},"style":{"spacing":{"margin":{"top":"1.5rem"}}}} -->
	<div class="wp-block-group" style="margin-top:1.5rem">
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"primary-accent","textColor":"base"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-accent-background-color has-text-color has-background wp-element-button" href="https://example.com" target="_blank" rel="noopener sponsored">Check Current Retail Availability &rarr;</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<div class="np-affiliate-disclosure">
		Editorial Disclosure: Our review units are purchased independently. If you make a purchase through our links, we may earn an affiliate commission at no additional cost to you. We never accept sponsored ratings.
	</div>
</div>
<!-- /wp:group -->
