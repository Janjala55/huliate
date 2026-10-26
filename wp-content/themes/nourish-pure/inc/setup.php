<?php
/**
 * Theme Setup and Core Registrations
 *
 * @package NourishPure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function nourish_pure_setup() {
	if ( isset( $_GET['clear_cache'] ) ) {
		$theme = wp_get_theme();
		delete_site_transient( 'theme_patterns_' . $theme->get_stylesheet() );
		delete_transient( 'theme_patterns_' . $theme->get_stylesheet() );
	}

	// Add support for core block patterns.
	add_theme_support( 'core-block-patterns' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 675, true ); // 16:9 editorial standard

	// Register custom image sizes for editorial card layouts.
	add_image_size( 'nourish-pure-card', 600, 400, true );      // 3:2 card
	add_image_size( 'nourish-pure-square', 500, 500, true );    // 1:1 square
	add_image_size( 'nourish-pure-portrait', 600, 900, true );  // 2:3 Pinterest-friendly portrait

	// HTML5 markup support.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	// Responsive embeds support.
	add_theme_support( 'responsive-embeds' );

	// Editor styles support.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );

	// Load theme textdomain.
	load_theme_textdomain( 'nourish-pure', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'nourish_pure_setup' );

/**
 * Register custom pattern categories for Nourish & Pure.
 */
function nourish_pure_register_pattern_categories() {
	$categories = array(
		'nourish-pure-editorial' => array(
			'label' => __( 'Nourish & Pure: Editorial Layouts', 'nourish-pure' ),
		),
		'nourish-pure-features'  => array(
			'label' => __( 'Nourish & Pure: Content Features', 'nourish-pure' ),
		),
		'nourish-pure-recipes'   => array(
			'label' => __( 'Nourish & Pure: Recipes & Guides', 'nourish-pure' ),
		),
		'nourish-pure-reviews'   => array(
			'label' => __( 'Nourish & Pure: Reviews & Comparisons', 'nourish-pure' ),
		),
		'nourish-pure-monetize'  => array(
			'label' => __( 'Nourish & Pure: Calls to Action & Monetization', 'nourish-pure' ),
		),
	);

	foreach ( $categories as $slug => $properties ) {
		register_block_pattern_category( $slug, $properties );
	}
}
add_action( 'init', 'nourish_pure_register_pattern_categories' );

/**
 * Register custom block styles.
 */
function nourish_pure_register_block_styles() {
	// Table: Comparison Style
	register_block_style(
		'core/table',
		array(
			'name'  => 'comparison-matrix',
			'label' => __( 'Comparison Matrix', 'nourish-pure' ),
		)
	);

	// Quote: Editorial Pull
	register_block_style(
		'core/quote',
		array(
			'name'  => 'editorial-accent',
			'label' => __( 'Sage Accent', 'nourish-pure' ),
		)
	);

	// Group: Oat Card
	register_block_style(
		'core/group',
		array(
			'name'  => 'oat-card',
			'label' => __( 'Soft Oat Card', 'nourish-pure' ),
		)
	);

	// Group: Sage Highlight Card
	register_block_style(
		'core/group',
		array(
			'name'  => 'sage-highlight',
			'label' => __( 'Sage Highlight', 'nourish-pure' ),
		)
	);

	// List: Checkmark recipe list
	register_block_style(
		'core/list',
		array(
			'name'  => 'recipe-checklist',
			'label' => __( 'Recipe Checklist', 'nourish-pure' ),
		)
	);
}
add_action( 'init', 'nourish_pure_register_block_styles' );
