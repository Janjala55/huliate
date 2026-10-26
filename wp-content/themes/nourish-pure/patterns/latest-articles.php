<?php
/**
 * Title: Nutritist Tips & Articles Grid
 * Slug: nourish-pure/latest-articles
 * Categories: nourish-pure-editorial, query
 * Description: 3-column articles grid mimicking Nutritist's Tips & Article section.
 * Keywords: grid, latest, articles, posts, nutritist
 */
?>
<!-- wp:group {"className":"np-articles-section-wrapper","layout":{"type":"default"}} -->
<section class="wp-block-group np-articles-section-wrapper">
	<div class="np-articles-container">
		<div class="np-dishes-header-row">
			<div class="np-dishes-header-left">
				<span class="np-eyebrow-text">Tips &amp; Articles</span>
				<h2 class="np-section-heading">Evidence-Based Editorial Guides</h2>
				<p class="np-dishes-subheading">Practical nutrition science, gut health blueprints, and batch cooking formulas to elevate your daily routine.</p>
			</div>
			<div class="np-dishes-header-right">
				<a href="/category/nutrition-education/" class="np-btn-nutritist-secondary">
					<span>All Articles &rarr;</span>
				</a>
			</div>
		</div>

		<!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"include","inherit":false}} -->
		<div class="wp-block-query np-query-wrapper">
			<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
				<!-- wp:group {"className":"np-article-card-nutritist"} -->
				<div class="wp-block-group np-article-card-nutritist">
					<div class="np-card-thumb-wrap">
						<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10"} /-->
					</div>
					<div class="np-card-content-wrap">
						<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"0.75rem","fontWeight":"700","letterSpacing":"0.06em","textTransform":"uppercase"}},"textColor":"primary-accent"} /-->
						<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"1.2rem","lineHeight":"1.35","fontFamily":"var(--wp--preset--font-family--serif)"},"spacing":{"margin":{"top":"0.45rem","bottom":"0.65rem"}}}} /-->
						<!-- wp:post-excerpt {"moreText":"","style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.55"}},"textColor":"secondary-text"} /-->
						<div class="np-card-meta-bottom">
							<!-- wp:post-date {"style":{"typography":{"fontSize":"0.75rem"}},"textColor":"secondary-text"} /-->
							<span class="np-meta-separator" aria-hidden="true">&bull;</span>
							<!-- wp:shortcode -->
							[nourish_pure_reading_time]
							<!-- /wp:shortcode -->
						</div>
					</div>
				</div>
				<!-- /wp:group -->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->
	</div>
</section>
<!-- /wp:group -->
