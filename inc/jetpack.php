<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Elakisto
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function elakisto_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'post-load',
		'wrapper'   => false,
		'render'    => 'elakisto_infinite_scroll_render',
		'footer_widgets' => 'sidebar-2',
		'footer'    => 'page',
		'type'      => 'click',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for JetPack Portfolio.
	add_theme_support( 'jetpack-portfolio' );

	// Enable social menu support.
	add_theme_support( 'jetpack-social-menu' );

	// Add Featured Content Support
	/*
	add_theme_support( 'featured-content', array(
		'filter'     => 'elakisto_get_featured_posts',
		'max_posts'  => 12,
		'post_types' => array( 'post', 'jetpack-portfolio' )
	) );
	*/

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'elakisto-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			//'reading_time' => '.reading-time',
		),
	) );
}
add_action( 'after_setup_theme', 'elakisto_jetpack_setup' );

/**
 * Change compression quality in Photon
 */

function elakisto_custom_photon_compression( $args ) {
    $args['quality'] = 95;
    return $args;
}
add_filter('jetpack_photon_pre_args', 'elakisto_custom_photon_compression' );

/**
 * Custom render function for Infinite Scroll.
 */
function elakisto_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) {
			get_template_part( 'template-parts/content', 'search' );
		} else {
			get_template_part( 'template-parts/content', get_post_format() );
		};
	}
}

function elakisto_fix_duplicate_products( $args ) {
    if ( 'product' === $args['post_type'] ) {
        $args['offset'] = $args['posts_per_page'] * $args['paged'];
    }
     return $args;
}
//add_filter( 'infinite_scroll_query_args', 'elakisto_fix_duplicate_products', 100 );

 /*
 * Change the posts_per_page Infinite Scroll setting from 10 to 20
 */
function my_theme_infinite_scroll_settings( $args ) {
    if ( is_array( $args ) )
    	$default_posts_per_page = get_option( 'posts_per_page' );
        $args['posts_per_page'] = $default_posts_per_page;
    return $args;
}
//add_filter( 'infinite_scroll_settings', 'my_theme_infinite_scroll_settings' );

/**
 * Filter Jetpack's Related Post thumbnail size.
 *
 * @param  $size (array) - Current width and height of thumbnail.
 * @return $size (array) - New width and height of thumbnail.
*/
function elakisto_jetpack_relatedposts_filter_thumbnail_size( $size ) {
	$size = array(
		'width'  => 200,
		'height' => 130
	);
	return $size;
}
add_filter( 'jetpack_relatedposts_filter_thumbnail_size', 'elakisto_jetpack_relatedposts_filter_thumbnail_size' );

function elakisto_more_related_posts( $options ) {
    $options['size'] = 4;
    return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'elakisto_more_related_posts' );

/**
 * Change width of gallery widget
 */
function elakisto_jetpackcom_custom_gallery_content_width(){
    return 300;
}
add_filter( 'gallery_widget_content_width', 'elakisto_jetpackcom_custom_gallery_content_width' );

/**
 * Change infinite scroll button text
 *
 * see: https://gist.github.com/kopepasah/9481454
 */
function elakisto_filter_jetpack_infinite_scroll_js_settings( $settings ) {
	$settings['text'] = __( 'Load More', 'elakisto' );
	return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'elakisto_filter_jetpack_infinite_scroll_js_settings' );

/**
 * Remove jetpack related posts from its place
 * it is placed inside template-parts/content-single.php via d-_shortcode
 *
 * @link https://jetpack.com/support/related-posts/customize-related-posts/#delete
 */
function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

/**
 * Enable related posts for jetpack portfolio posts
 *
 * @link https://jetpack.com/support/related-posts/customize-related-posts/#related-posts-custom-post-types
 */
function elakisto_allow_my_post_types($allowed_post_types) {
    $allowed_post_types[] = 'jetpack-portfolio';
    return $allowed_post_types;
}
add_filter( 'rest_api_allowed_post_types', 'elakisto_allow_my_post_types' );

/**
 * disable sharedaddy and like buttons from standard place
 * they are added in single.php
 *
 */

function elakisto_jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
}

add_action( 'loop_start', 'elakisto_jptweak_remove_share' );

/**
 * Social menu
 */
function elakisto_social_menu() {

	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}

}

/**
 * Featured posts filter function
 */
function elakisto_get_featured_posts() {
	return apply_filters( 'elakisto_get_featured_posts', array() );
}

 /**
 * A helper conditional function that returns a boolean value.
 */
function elakisto_has_featured_posts() {
	return ( bool ) elakisto_get_featured_posts();
}
