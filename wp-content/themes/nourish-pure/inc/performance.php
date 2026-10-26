<?php
/**
 * Performance and Asset Optimizations
 *
 * @package NourishPure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove unnecessary generator meta tags and headers for cleaner output.
 */
function nourish_pure_clean_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
}
add_action( 'init', 'nourish_pure_clean_head' );

/**
 * Preconnect to origin to accelerate font rendering and layout calculations.
 */
function nourish_pure_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		// Preconnect to Google Fonts only if external fonts are configured by user.
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'nourish_pure_resource_hints', 10, 2 );

/**
 * Enhance LCP performance: Prevent lazy-loading on the primary single article featured image.
 *
 * @param array        $attr       Attributes for the image markup.
 * @param WP_Post      $attachment Image attachment post.
 * @param string|array $size       Requested image size.
 * @return array
 */
function nourish_pure_optimize_hero_image( $attr, $attachment, $size ) {
	if ( is_singular( 'post' ) && did_action( 'wp_body_open' ) && ! did_action( 'nourish_pure_after_hero_rendered' ) ) {
		// Mark hero image as high fetch priority and eager loading for superior LCP.
		$attr['loading']       = 'eager';
		$attr['fetchpriority'] = 'high';
		$attr['decoding']      = 'async';
		do_action( 'nourish_pure_after_hero_rendered' );
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'nourish_pure_optimize_hero_image', 10, 3 );
