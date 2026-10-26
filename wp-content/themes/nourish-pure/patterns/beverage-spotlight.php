<?php
/**
 * Title: Beverage & Extraction Spotlight
 * Slug: nourish-pure/beverage-spotlight
 * Categories: nourish-pure-features, nourish-pure-recipes
 * Description: Editorial showcase highlighting craft beverages, cold-pressed tonics, or coffee extractions.
 * Keywords: beverage, drink, juice, smoothie, coffee, tonic
 */
$beverage_img = content_url( '/uploads/2026/10/beverage-tonic-spotlight.jpg' );
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3.5rem","bottom":"3.5rem"}}},"backgroundColor":"highlight","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-highlight-background-color has-background" style="padding-top:3.5rem;padding-bottom:3.5rem">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"2.5rem","left":"3.5rem"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.8125rem","fontWeight":"700","letterSpacing":"0.1em","textTransform":"uppercase"}},"textColor":"secondary-accent"} -->
			<p class="has-secondary-accent-color has-text-color" style="font-size:0.8125rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase">Beverage &amp; Extraction Craft</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--serif)","fontSize":"clamp(1.75rem, 3vw, 2.35rem)"}}} -->
			<h2 class="wp-block-heading" style="font-family:var(--wp--preset--font-family--serif);font-size:clamp(1.75rem, 3vw, 2.35rem)">The Architecture of Cold-Pressed Juicing</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.0625rem","lineHeight":"1.65"}},"textColor":"secondary-text"} -->
			<p class="has-secondary-text-color" style="font-size:1.0625rem;line-height:1.65">Why hydraulic mastication preserves up to 5x more micronutrients than high-rpm centrifugal blades, and how balancing organic acids with root vegetables elevates daily tonics.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"primary-accent","textColor":"base"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-accent-background-color has-text-color has-background wp-element-button" href="/category/drinks/">Explore Beverage Guides &rarr;</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"6px"}}} -->
			<figure class="wp-block-image size-large"><img src="<?php echo esc_url( $beverage_img ); ?>" alt="Cold-Pressed Botanical Elixir" style="border-radius:6px;object-fit:cover;aspect-ratio:4/3;width:100%"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
