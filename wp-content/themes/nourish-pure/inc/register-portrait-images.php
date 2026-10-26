<?php
/**
 * Register Portrait Attachments in WordPress
 */
require_once dirname( __DIR__, 4 ) . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$files = array(
	'gentle-gut-reset-fiber-portrait.jpg'    => 'Gentle Gut Reset Portrait - 35g Soluble Fiber',
	'35g-daily-fiber-blueprint-portrait.jpg' => '35g Daily Fiber Blueprint Portrait - Whole Foods',
);

$upload_dir = wp_upload_dir();
foreach ( $files as $file => $title ) {
	$filepath = $upload_dir['basedir'] . '/2026/10/' . $file;
	$fileurl  = $upload_dir['baseurl'] . '/2026/10/' . $file;
	if ( file_exists( $filepath ) ) {
		$attachment = array(
			'guid'           => $fileurl,
			'post_mime_type' => 'image/jpeg',
			'post_title'     => $title,
			'post_content'   => '',
			'post_status'    => 'inherit',
		);
		$attach_id = wp_insert_attachment( $attachment, $filepath );
		if ( ! is_wp_error( $attach_id ) ) {
			$data = wp_generate_attachment_metadata( $attach_id, $filepath );
			wp_update_attachment_metadata( $attach_id, $data );
			update_post_meta( $attach_id, '_wp_attachment_image_alt', $title );
			echo "Registered attachment ID {$attach_id} for {$file}\n";
		}
	}
}
