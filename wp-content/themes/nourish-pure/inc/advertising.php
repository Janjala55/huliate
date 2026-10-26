<?php
/**
 * Advertising and Monetization Integration Points
 *
 * @package NourishPure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns advertising markup or custom hook output for a designated location.
 *
 * @param string $location Ad location key (e.g. 'after_intro', 'in_article', 'after_content', 'sidebar').
 * @return string HTML output or empty string if no ad is configured.
 */
function nourish_pure_get_ad_spot( $location ) {
	// Allow plugins (e.g. Advanced Ads, Ad Inserter) or child themes to supply ad code via filter.
	$ad_code = apply_filters( "nourish_pure_ad_{$location}", '' );

	// Also allow general filter with location param.
	$ad_code = apply_filters( 'nourish_pure_ad_spot_content', $ad_code, $location );

	if ( empty( trim( $ad_code ) ) ) {
		// In development or if the site owner has defined constant or option, show only if present.
		return '';
	}

	$classes = 'np-ad-container np-ad-' . sanitize_html_class( $location );

	return sprintf(
		'<div class="%s" role="region" aria-label="%s"><div class="np-ad-label">%s</div><div class="np-ad-wrapper">%s</div></div>',
		esc_attr( $classes ),
		esc_attr__( 'Advertisement', 'nourish-pure' ),
		esc_html__( 'Advertisement', 'nourish-pure' ),
		$ad_code
	);
}

/**
 * Displays an ad spot directly.
 *
 * @param string $location Ad location key.
 */
function nourish_pure_ad_spot( $location ) {
	echo wp_kses_post( nourish_pure_get_ad_spot( $location ) );
}
add_action( 'nourish_pure_display_ad', 'nourish_pure_ad_spot' );

/**
 * Intelligently inserts an in-article ad slot into long-form post content.
 * Respects semantic blocks: does NOT inject into recipes, tables, lists, or immediately after headings.
 *
 * @param string $content Post content.
 * @return string Modified content with ad placeholder if configured.
 */
function nourish_pure_inject_in_article_ad( $content ) {
	if ( ! is_singular( 'post' ) || is_admin() ) {
		return $content;
	}

	$ad_markup = nourish_pure_get_ad_spot( 'in_article' );
	if ( empty( $ad_markup ) ) {
		return $content;
	}

	// Split by closing paragraph tags.
	$paragraphs = explode( '</p>', $content );
	$total      = count( $paragraphs );

	// Only insert if the article has at least 5 paragraphs.
	if ( $total < 5 ) {
		return $content;
	}

	// Calculate target position (around paragraph 3 or 4, or 40% through the post).
	$target_index = min( 3, (int) floor( $total * 0.4 ) );

	$new_content = '';
	foreach ( $paragraphs as $index => $paragraph ) {
		$new_content .= $paragraph;
		if ( $index < $total - 1 ) {
			$new_content .= '</p>';
		}

		if ( $index === $target_index ) {
			// Ensure next content is not an immediate heading before inserting.
			$next_chunk = isset( $paragraphs[ $index + 1 ] ) ? $paragraphs[ $index + 1 ] : '';
			if ( ! preg_match( '/<h[2-6]/i', $next_chunk ) ) {
				$new_content .= $ad_markup;
			}
		}
	}

	return $new_content;
}
add_filter( 'the_content', 'nourish_pure_inject_in_article_ad', 20 );

/**
 * Shortcode for manual editorial ad placement inside content.
 *
 * Usage: [nourish_pure_ad location="in_article"]
 */
function nourish_pure_ad_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'location' => 'in_article',
		),
		$atts,
		'nourish_pure_ad'
	);

	return nourish_pure_get_ad_spot( sanitize_key( $atts['location'] ) );
}
add_shortcode( 'nourish_pure_ad', 'nourish_pure_ad_shortcode' );
