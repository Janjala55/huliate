<?php
/**
 * Social Sharing and Metadata Integration
 *
 * @package NourishPure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if a known third-party SEO plugin is managing Open Graph metadata.
 *
 * @return bool
 */
function nourish_pure_has_active_seo_plugin() {
	return (
		defined( 'WPSEO_VERSION' ) ||               // Yoast SEO
		class_exists( 'RankMath' ) ||               // Rank Math
		defined( 'AIOSEO_VERSION' ) ||              // All in One SEO
		defined( 'SEOPRESS_VERSION' ) ||            // SEOPress
		class_exists( 'The_SEO_Framework' )         // The SEO Framework
	);
}

/**
 * Output basic Open Graph meta tags only when no SEO plugin is installed.
 */
function nourish_pure_output_open_graph() {
	if ( nourish_pure_has_active_seo_plugin() || ! is_singular( 'post' ) ) {
		return;
	}

	global $post;
	$title       = get_the_title( $post );
	$url         = get_permalink( $post );
	$description = has_excerpt( $post ) ? get_the_excerpt( $post ) : wp_strip_all_tags( wp_trim_words( $post->post_content, 35 ) );
	$site_name   = get_bloginfo( 'name' );

	echo "\n<!-- Nourish & Pure Fallback Open Graph Metadata -->\n";
	echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '">' . "\n";
	echo '<meta property="og:type" content="article">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";

	if ( has_post_thumbnail( $post ) ) {
		$img_id  = get_post_thumbnail_id( $post );
		$img_src = wp_get_attachment_image_src( $img_id, 'large' );
		if ( ! empty( $img_src[0] ) ) {
			echo '<meta property="og:image" content="' . esc_url( $img_src[0] ) . '">' . "\n";
			echo '<meta property="og:image:width" content="' . esc_attr( $img_src[1] ) . '">' . "\n";
			echo '<meta property="og:image:height" content="' . esc_attr( $img_src[2] ) . '">' . "\n";
		}
	}
	echo "<!-- End Nourish & Pure Open Graph -->\n\n";
}
add_action( 'wp_head', 'nourish_pure_output_open_graph', 5 );

/**
 * Renders the editorial social share buttons.
 *
 * @param array $args Optional display arguments.
 * @return string HTML output of share buttons.
 */
function nourish_pure_render_social_share( $args = array() ) {
	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return '';
	}

	$post_id   = get_the_ID();
	$permalink = get_permalink( $post_id );
	$title     = get_the_title( $post_id );

	// Pinterest image lookup (fallback to featured image).
	$pin_image = '';
	if ( has_post_thumbnail( $post_id ) ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
		if ( ! empty( $thumb[0] ) ) {
			$pin_image = $thumb[0];
		}
	}

	$encoded_url   = rawurlencode( $permalink );
	$encoded_title = rawurlencode( html_entity_decode( $title, ENT_QUOTES, 'UTF-8' ) );
	$encoded_image = rawurlencode( $pin_image );

	// Pinterest share URL
	$pinterest_url = sprintf(
		'https://pinterest.com/pin/create/button/?url=%s&media=%s&description=%s',
		$encoded_url,
		$encoded_image,
		$encoded_title
	);

	// Facebook share URL
	$facebook_url = sprintf( 'https://www.facebook.com/sharer/sharer.php?u=%s', $encoded_url );

	// X (Twitter) share URL
	$twitter_url = sprintf( 'https://twitter.com/intent/tweet?url=%s&text=%s', $encoded_url, $encoded_title );

	// Email share URL
	$email_subject = rawurlencode( sprintf( __( 'Thought you would love this: %s', 'nourish-pure' ), $title ) );
	$email_body    = rawurlencode( sprintf( __( 'Check out this article on Huliate: %s', 'nourish-pure' ), $permalink ) );
	$email_url     = "mailto:?subject={$email_subject}&body={$email_body}";

	ob_start();
	?>
	<div class="np-social-share-bar" role="region" aria-label="<?php esc_attr_e( 'Share this article', 'nourish-pure' ); ?>">
		<div class="np-share-label-wrap">
			<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
			<span class="np-share-label"><?php esc_html_e( 'Share Article', 'nourish-pure' ); ?></span>
		</div>
		<div class="np-share-buttons-group">
			<!-- Pinterest Button -->
			<a class="np-share-pill np-share-pinterest" href="<?php echo esc_url( $pinterest_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Save to Pinterest', 'nourish-pure' ); ?>">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.373 0 0 5.373 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 0 1 .083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.632-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z"/></svg>
				<span class="np-share-text"><?php esc_html_e( 'Save', 'nourish-pure' ); ?></span>
			</a>

			<!-- Facebook Button -->
			<a class="np-share-pill np-share-facebook" href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on Facebook', 'nourish-pure' ); ?>">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
				<span class="np-share-text"><?php esc_html_e( 'Share', 'nourish-pure' ); ?></span>
			</a>

			<!-- X (Twitter) Button -->
			<a class="np-share-pill np-share-twitter" href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on X', 'nourish-pure' ); ?>">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
				<span class="np-share-text"><?php esc_html_e( 'Post', 'nourish-pure' ); ?></span>
			</a>

			<!-- Email Button -->
			<a class="np-share-pill np-share-email" href="<?php echo esc_url( $email_url ); ?>" aria-label="<?php esc_attr_e( 'Share via Email', 'nourish-pure' ); ?>">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
				<span class="np-share-text"><?php esc_html_e( 'Email', 'nourish-pure' ); ?></span>
			</a>

			<!-- Native Web Share / Copy Link Trigger -->
			<button type="button" class="np-share-pill np-share-native" data-url="<?php echo esc_url( $permalink ); ?>" data-title="<?php echo esc_attr( $title ); ?>" aria-label="<?php esc_attr_e( 'Share or copy link', 'nourish-pure' ); ?>">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
				<span class="np-share-text"><?php esc_html_e( 'Copy', 'nourish-pure' ); ?></span>
			</button>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	// Remove HTML comments so wpautop doesn't wrap them in p tags
	$html = preg_replace( '/<!--(.*?)-->/s', '', $html );
	// Strip all newlines, tabs, and spaces between tags to eliminate unwanted br/p generation
	$html = preg_replace( '/>\s+</', '><', $html );
	$html = trim( str_replace( array( "\r", "\n", "\t" ), '', $html ) );
	return $html;
}

/**
 * Shortcode for social sharing buttons.
 */
add_shortcode( 'nourish_pure_social_share', 'nourish_pure_render_social_share' );
