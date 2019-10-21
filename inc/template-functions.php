<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Elakisto
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function elakisto_body_classes( $classes ) {
	// Customizer Settings
	$nav_alignment = get_theme_mod( 'header_nav_align_setting', 'left' );


	$classes[] = 'main-nav-align-' . $nav_alignment;

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_single() ) {
		$single_nav = get_theme_mod( 'single_navigation', 1 );
		if (!$single_nav) {
			$classes[] = 'hide-single-nav';
		}
	}

	// No sidebar class
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'templates/portfolio-page.php' ) && ! is_post_type_archive('jetpack-portfolio') && ! is_singular('jetpack-portfolio') && ! is_tax('jetpack-portfolio-type')  ) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

	// archive layout
	$archive_layout = get_theme_mod( 'archive_layout_setting', 'side' );
	if (is_archive() || is_home() || is_page_template( 'templates/portfolio-page.php' )) {
		$classes[] = 'archive-layout-' . $archive_layout;
	}

	$rounded_corners = get_theme_mod( 'archive_rounded_corners', 0 );
	if ($rounded_corners == 1) {
		$classes[] = 'rounded-corners';
	}

	return $classes;
}
add_filter( 'body_class', 'elakisto_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function elakisto_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'elakisto_pingback_header' );

/**
 * Get Thumbnail Image Size Class
 *
 * @since elakisto 1.0
 */
function elakisto_get_featured_image_class() {

	$thumb_class            = '';

	$imgData     = wp_get_attachment_metadata( get_post_thumbnail_id( get_the_ID() ) );
	$width       = $imgData['width'];
	$height      = $imgData['height'];

	if ( $width > $height || $width == $height ) {
		$thumb_class = 'horizontal-img';
	} else {
		$thumb_class = 'vertical-img';
	}

	return $thumb_class;

}

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function elakisto_post_classes( $classes ) {

	if ( !has_post_thumbnail() ) {
		$classes[] = 'no-featured-image';
	} else {
		$classes[] = 'has-featured-image';
	}

	return $classes;
}
add_filter( 'post_class', 'elakisto_post_classes' );

/**
 * Parenthesses remove
 *
 * Removes parenthesses from category and archives widget
 *
 * @since elakisto 1.0
 */
function elakisto_categories_postcount_filter( $variable ) {
	$variable = str_replace( '(', '<span class="post_count">', $variable );
	$variable = str_replace( ')', '</span>', $variable );
	return $variable;
}
add_filter( 'wp_list_categories','elakisto_categories_postcount_filter' );

function elakisto_archives_postcount_filter( $variable ) {
	$variable = str_replace( '(', '<span class="post_count">', $variable );
	$variable = str_replace( ')', '</span>', $variable );
	return $variable;
}
add_filter( 'get_archives_link','elakisto_archives_postcount_filter' );

function elakisto_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'elakisto_excerpt_length', 999 );

if ( ! function_exists( 'elakisto_excerpt_readmore' ) ) :
function elakisto_excerpt_readmore($more) {
	global $post;
	return '<br/><a href="'. get_permalink($post->ID) . '" class="readmore">' . esc_html__( 'Continue Reading', 'elakisto' ) . '</a>';
}
endif;
add_filter('excerpt_more', 'elakisto_excerpt_readmore');

if ( ! function_exists( 'modify_read_more_link' ) ) :
function modify_read_more_link() {
    return '<br/><a href="'. get_permalink() . '" class="readmore">' . esc_html__( 'Continue Reading', 'elakisto' ) . '</a>';
}
endif;
add_filter( 'the_content_more_link', 'modify_read_more_link' );


/**
 * Change tag cloud font size
 *
 * @since  elakisto 1.0
 */
function elakisto_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'elakisto_widget_tag_cloud_args' );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function elakisto_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];
	$height = $size[1];
	//var_dump($size);
	//echo '<br/>';
	//var_dump($sizes);
	//echo '<br/>';echo '<br/>';
	// min-hight = 650px

	// 840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	// if ( 'gallery' === get_post_format() ) {

		// 840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';

		if ($height < 650) {
			$aspect = $height / $width;

			$size[1] = 650;
			$size[0] = 650 * $aspect;
		}

		$sizes = '(max-width: ' . 'none' . ') 100vw, ' . $width . 'px';
	// }

	return$sizes;
}
//add_filter( 'wp_calculate_image_sizes', 'elakisto_content_image_sizes_attr', 10 , 2 );

//Adds gallery shortcode defaults of size="medium" and columns="2"

function elakisto_gallery_atts( $out, $pairs, $atts ) {
    $atts = shortcode_atts( array(
      'columns' => '1',
      'size' => 'elakisto-single-format',
    ), $atts );

    $out['columns'] = $atts['columns'];
    $out['size'] = $atts['size'];

    return $out;

}
add_filter( 'shortcode_atts_gallery', 'elakisto_gallery_atts', 10, 3 );


add_filter( 'post_class', 'elakisto_sticky_classes', 10, 3 );
function elakisto_sticky_classes( $classes, $class, $post_id ) {

    // Bail if this is not a sticky post.
    if ( ! is_sticky() ) {
        return $classes;
    }

    if (!is_single()) {
    	$classes[] = 'sticky';
    }
    return $classes;
}

add_action('widgets_init', 'elakisto_remove_recent_comments_style');
function elakisto_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
