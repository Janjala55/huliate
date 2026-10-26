<?php
/**
 * Register Attachments and Set Featured Images for All Authentic Nutrition Posts
 *
 * @package NourishPure
 */

// If running from CLI or included
if ( ! defined( 'ABSPATH' ) ) {
	$wp_load = dirname( __DIR__, 4 ) . '/wp-load.php';
	if ( file_exists( $wp_load ) ) {
		require_once $wp_load;
	} else {
		exit( "Could not locate wp-load.php\n" );
	}
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$posts_images = array(
	'gentle-gut-reset-fiber' => array(
		'file'  => 'gentle-gut-reset-fiber.jpg',
		'title' => 'The Gentle Gut Reset with Soluble Fiber',
		'alt'   => 'Wholesome simmered broth with chia seeds, lentils, and steamed greens in neutral daylight',
	),
	'resistant-starch-blood-sugar-gut' => array(
		'file'  => 'resistant-starch-blood-sugar-gut.jpg',
		'title' => 'Resistant Starch Method - Chilled Cooked Potatoes',
		'alt'   => 'Chilled baby potatoes and brown rice meal prep with fork in realistic daylight',
	),
	'cabbage-brassica-gut-health-bloating' => array(
		'file'  => 'cabbage-brassica-gut-health-bloating.jpg',
		'title' => 'Blistered Cabbage and Brassicas',
		'alt'   => 'Cast iron skillet with blistered Savoy cabbage and crushed caraway seeds',
	),
	'why-fiber-worsens-constipation-water-ratio' => array(
		'file'  => 'why-fiber-worsens-constipation-water-ratio.jpg',
		'title' => 'Kiwi Motility and Hydration Ratio',
		'alt'   => 'Sliced ripe green kiwifruit, tall glass of water, and whole chia seeds on kitchen counter',
	),
	'low-fodmap-trap-microbiome-reintroduction' => array(
		'file'  => 'low-fodmap-trap-microbiome-reintroduction.jpg',
		'title' => 'Microbiome Diversity Reintroduction Plate',
		'alt'   => 'Diverse plate with sautéed leek, roasted asparagus, lentils, and wild greens',
	),
	'30g-protein-10g-fiber-breakfast-sequencing' => array(
		'file'  => '30g-protein-10g-fiber-breakfast-sequencing.jpg',
		'title' => 'The 30g Protein 10g Fiber Morning Breakfast',
		'alt'   => 'Soft-boiled pasture-raised eggs, roasted edamame, avocado, and sprouted whole grain toast',
	),
	'meal-prep-soggy-ruined-component-method' => array(
		'file'  => 'meal-prep-soggy-ruined-component-method.jpg',
		'title' => 'The Component Meal Prep Method',
		'alt'   => 'Modular glass containers separating roasted chickpeas, quinoa, and crisp greens with dressing on the side',
	),
	'35g-daily-fiber-blueprint' => array(
		'file'  => '35g-daily-fiber-blueprint.jpg',
		'title' => 'The 35g Daily Fiber Blueprint Foods',
		'alt'   => 'Whole high-fiber foods arranged on neutral stone counter: lentils, raspberries, avocados, chia, and artichoke',
	),
	'3-2-1-meal-prep-formula' => array(
		'file'  => '3-2-1-meal-prep-formula.jpg',
		'title' => 'The 3-2-1 Sunday Meal Prep Formula',
		'alt'   => 'Sunday batch cooking layout with three roasted vegetables, two proteins, and one base sauce in glass containers',
	),
	'blood-sugar-balanced-plate' => array(
		'file'  => 'blood-sugar-balanced-plate.jpg',
		'title' => 'Glycemic Balanced Plate Plating',
		'alt'   => 'Top-down balanced plate with half steamed greens and broccoli, quarter wild salmon, and quarter sweet potato',
	),
	'nutrient-dense-pantry-staples' => array(
		'file'  => 'nutrient-dense-pantry-staples.jpg',
		'title' => '12 Nutrient-Dense Budget Pantry Staples',
		'alt'   => 'Honest pantry shelf with glass jars of green lentils, pumpkin seeds, rolled oats, and canned sardines',
	),
);

$upload_dir = wp_upload_dir();
$upload_path = $upload_dir['basedir'] . '/2026/10/';
$upload_url  = $upload_dir['baseurl'] . '/2026/10/';

echo "Starting image attachment process...\n";

foreach ( $posts_images as $slug => $info ) {
	$file_path = $upload_path . $info['file'];
	$file_url  = $upload_url . $info['file'];

	if ( ! file_exists( $file_path ) ) {
		echo "ERROR: File not found: {$file_path}\n";
		continue;
	}

	// Find the post by slug
	$posts = get_posts( array(
		'name'        => $slug,
		'post_type'   => 'post',
		'post_status' => 'any',
		'numberposts' => 1,
	) );

	if ( empty( $posts ) ) {
		echo "WARNING: Post not found for slug '{$slug}'\n";
		continue;
	}

	$post = $posts[0];
	$post_id = $post->ID;

	// Check if attachment already exists
	$existing_attachment_id = 0;
	$relative_file = '2026/10/' . $info['file'];
	
	global $wpdb;
	$att_id = $wpdb->get_var( $wpdb->prepare(
		"SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value = %s LIMIT 1",
		$relative_file
	) );

	if ( $att_id ) {
		$attach_id = (int) $att_id;
		echo "Found existing attachment ID {$attach_id} for {$info['file']}\n";
	} else {
		$attachment = array(
			'guid'           => $file_url,
			'post_mime_type' => 'image/jpeg',
			'post_title'     => $info['title'],
			'post_content'   => '',
			'post_status'    => 'inherit',
		);

		$attach_id = wp_insert_attachment( $attachment, $file_path, $post_id );

		if ( is_wp_error( $attach_id ) ) {
			echo "ERROR inserting attachment for {$slug}: " . $attach_id->get_error_message() . "\n";
			continue;
		}

		$attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		echo "Created new attachment ID {$attach_id} for {$info['file']}\n";
	}

	// Set alt text
	update_post_meta( $attach_id, '_wp_attachment_image_alt', $info['alt'] );

	// Set as featured image
	set_post_thumbnail( $post_id, $attach_id );
	echo "SUCCESS: Set featured image ID {$attach_id} for Post {$post_id} ('{$post->post_title}')\n";
}

echo "Image attachment complete!\n";
