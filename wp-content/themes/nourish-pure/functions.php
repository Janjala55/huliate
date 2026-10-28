<?php
/**
 * Nourish & Pure Theme Functions and Definitions
 *
 * @package NourishPure
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define Theme Constants
 */
define( 'NOURISH_PURE_VERSION', '1.0.0' );
define( 'NOURISH_PURE_DIR', get_template_directory() );
define( 'NOURISH_PURE_URI', get_template_directory_uri() );

/**
 * Require Modular Theme Components
 */
require_once NOURISH_PURE_DIR . '/inc/setup.php';
require_once NOURISH_PURE_DIR . '/inc/performance.php';
require_once NOURISH_PURE_DIR . '/inc/reading-time.php';
require_once NOURISH_PURE_DIR . '/inc/sharing.php';
require_once NOURISH_PURE_DIR . '/inc/advertising.php';
require_once NOURISH_PURE_DIR . '/inc/editor-styles.php';
require_once NOURISH_PURE_DIR . '/inc/seed-lead-story.php';
require_once NOURISH_PURE_DIR . '/inc/update-sample-posts.php';

/**
 * Enqueue Frontend Scripts and Styles
 */
function nourish_pure_enqueue_scripts() {
	// Enqueue main stylesheet (style.css handles header comments and print fallbacks).
	wp_enqueue_style(
		'nourish-pure-style',
		get_stylesheet_uri(),
		array(),
		NOURISH_PURE_VERSION
	);

	// Enqueue theme enhanced styling (components, recipe cards, tables, ads, mobile share).
	wp_enqueue_style(
		'nourish-pure-main',
		NOURISH_PURE_URI . '/assets/css/main.css',
		array( 'nourish-pure-style' ),
		NOURISH_PURE_VERSION
	);

	// Enqueue global theme scripts (deferred for performance).
	wp_enqueue_script(
		'nourish-pure-scripts',
		NOURISH_PURE_URI . '/assets/js/theme-scripts.js',
		array(),
		NOURISH_PURE_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	// Localize strings for Web Share and clipboard feedback.
	wp_localize_script(
		'nourish-pure-scripts',
		'nourishPureData',
		array(
			'copiedText' => __( 'Link copied to clipboard!', 'nourish-pure' ),
			'shareError' => __( 'Unable to share on this device.', 'nourish-pure' ),
		)
	);

	// Reading progress script: Enqueue strictly on single articles.
	if ( is_singular( 'post' ) ) {
		wp_enqueue_script(
			'nourish-pure-reading-progress',
			NOURISH_PURE_URI . '/assets/js/reading-progress.js',
			array(),
			NOURISH_PURE_VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}

	// Enqueue threaded comment replies when needed.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nourish_pure_enqueue_scripts' );

/**
 * Add Pinterest Domain Verification Meta Tag
 */
function nourish_pure_pinterest_verification_meta() {
	echo '<meta name="p:domain_verify" content="830795067814d81fba015766519739a5" />' . "\n";
}
add_action( 'wp_head', 'nourish_pure_pinterest_verification_meta', 1 );
