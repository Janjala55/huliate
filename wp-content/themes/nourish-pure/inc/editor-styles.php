<?php
/**
 * Editor Styles and Block Editor Customizations
 *
 * @package NourishPure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue block editor assets for Nourish & Pure.
 */
function nourish_pure_block_editor_assets() {
	wp_enqueue_style(
		'nourish-pure-editor-styles',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'enqueue_block_editor_assets', 'nourish_pure_block_editor_assets' );
