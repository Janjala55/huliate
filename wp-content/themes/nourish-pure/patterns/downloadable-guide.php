<?php
/**
 * Title: Downloadable Guide & Digital Cookbook Callout
 * Slug: nourish-pure/downloadable-guide
 * Categories: nourish-pure-monetize, layout
 * Description: Editorial showcase box promoting a downloadable culinary field guide or seasonal cookbook.
 * Keywords: ebook, guide, cookbook, download, product
 */
$guide_img = content_url( '/uploads/2026/10/fermentation-guide-book.jpg' );
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3rem","right":"2.5rem","bottom":"3rem","left":"2.5rem"},"margin":{"top":"3rem","bottom":"3rem"}},"border":{"radius":"6px"}},"backgroundColor":"highlight","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-highlight-background-color has-background" style="border-radius:6px;margin-top:3rem;margin-bottom:3rem;padding-top:3rem;padding-right:2.5rem;padding-bottom:3rem;padding-left:2.5rem">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"2rem","left":"3rem"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
			<figure class="wp-block-image size-large"><img src="<?php echo esc_url( $guide_img ); ?>" alt="Fermentation Field Guide Publication" style="border-radius:6px;object-fit:cover;aspect-ratio:3/4;width:100%"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.8125rem","fontWeight":"700","letterSpacing":"0.1em","textTransform":"uppercase"}},"textColor":"secondary-accent"} -->
			<p class="has-secondary-accent-color has-text-color" style="font-size:0.8125rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase">Digital Edition &bull; Printable PDF &amp; Grocery Checklists</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--serif)","fontSize":"2rem"}}} -->
			<h3 class="wp-block-heading" style="font-family:var(--wp--preset--font-family--serif);font-size:2rem">The 28-Day High-Fiber &amp; Balanced Meal Blueprint</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.65"}},"textColor":"secondary-text"} -->
			<p class="has-secondary-text-color" style="font-size:1rem;line-height:1.65">A complete, evidence-based meal prep framework designed to hit 35g of daily fiber effortlessly. Includes 4 weeks of done-for-you grocery lists, 15-minute lunch assembly formulas, and debloating digestion protocols.</p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
			<ul class="wp-block-list" style="font-size:0.9375rem">
				<li>28 daily meal blueprints balancing protein, prebiotic fiber, and healthy fats</li>
				<li>Printable weekly grocery shopping checklists categorized by aisle</li>
				<li>Quick 3-2-1 batch cooking schedule requiring only 60 minutes on Sunday</li>
				<li>Immediate digital PDF download formatted for mobile and desktop</li>
			</ul>
			<!-- /wp:list -->

			<!-- wp:group {"layout":{"type":"flex","alignItems":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"1.5rem"}}}} -->
			<div class="wp-block-group" style="margin-top:1.5rem">
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"primary-accent","textColor":"base"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-accent-background-color has-text-color has-background wp-element-button" href="/35g-daily-fiber-blueprint/">Download Free 28-Day Blueprint (PDF) &rarr;</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
