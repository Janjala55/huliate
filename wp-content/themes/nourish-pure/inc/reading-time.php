<?php
/**
 * Estimated Reading Time Calculation
 *
 * @package NourishPure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Calculates the estimated reading time for a given post.
 *
 * @param int|WP_Post|null $post Optional. Post ID or post object. Defaults to current global post.
 * @return string Formatted reading time string (e.g. "4 min read").
 */
function nourish_pure_get_reading_time( $post = null ) {
	$post = get_post( $post );

	if ( ! $post ) {
		return '';
	}

	$content    = get_post_field( 'post_content', $post->ID );
	$clean_text = wp_strip_all_tags( strip_shortcodes( $content ) );
	$word_count = str_word_count( $clean_text );

	// Standard adult reading speed is approximately 200-220 words per minute.
	$words_per_minute = 200;
	$minutes          = max( 1, (int) ceil( $word_count / $words_per_minute ) );

	/* translators: %d: estimated reading time in minutes */
	return sprintf( _n( '%d min read', '%d min read', $minutes, 'nourish-pure' ), $minutes );
}

/**
 * Shortcode handler for displaying reading time anywhere.
 *
 * Usage: [nourish_pure_reading_time]
 *
 * @return string
 */
function nourish_pure_reading_time_shortcode() {
	$time = nourish_pure_get_reading_time();
	if ( empty( $time ) ) {
		return '';
	}
	return '<span class="np-reading-time-badge" aria-label="' . esc_attr__( 'Estimated reading time', 'nourish-pure' ) . '"><svg class="np-clock-icon" aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>' . esc_html( $time ) . '</span>';
}
add_shortcode( 'nourish_pure_reading_time', 'nourish_pure_reading_time_shortcode' );

/**
 * Ensure core/shortcode blocks execute shortcodes across all FSE block templates and query loops.
 */
add_filter( 'render_block_core/shortcode', function( $block_content ) {
	return do_shortcode( $block_content );
} );
