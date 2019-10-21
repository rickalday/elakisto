<?php
/**
 * Elakisto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elakisto
 */

if ( ! function_exists( 'elakisto_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elakisto_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Elakisto, use a find and replace
		 * to change 'elakisto' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elakisto', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// custom header - disable header image
		add_theme_support( 'custom-header', array(
			'wp-head-callback' => 'elakisto_header_style',
		) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Image sizes
		add_image_size( 'elakisto-archive-sticky', 1100, 99999, false );
		add_image_size( 'elakisto-archive', 550, 99999, false );
		add_image_size( 'elakisto-search', 160, 99999, false );
		add_image_size( 'elakisto-single-post', 740, 99999, false );
		add_image_size( 'elakisto-slider', 1600, 99999, false );
		add_image_size( 'elakisto-single-format', 99999, 650, false );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'elakisto' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'gallery',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'elakisto_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		* Add support for Gutenberg.
		*
		* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		//add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-color-palette',
			array(
				'name' => __( 'Background Gold', 'elakisto' ),
				'slug' => 'background-gold',
				'color' => '#eee7e1',
			),
			array(
				'name' => __( 'Accent Gold', 'elakisto' ),
				'slug' => 'accent-gold',
				'color' => '#c69f73',
			),
			array(
				'name' => __( 'Accent Green', 'elakisto' ),
				'slug' => 'accent-green',
				'color' => '#273c3c',
			),
			array(
				'name' => __( 'Black', 'elakisto' ),
				'slug' => 'black',
				'color' => '#000',
			),
			array(
				'name' => __( 'Grey', 'elakisto' ),
				'slug' => 'grey',
				'color' => '#404040',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'elakisto_setup' );

// add css for hideing header text
function elakisto_header_style() {
	/*
	 * If header text is set to display, let's bail.
	 */
	if ( display_header_text() ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	</style>
	<?php
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elakisto_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'elakisto_content_width', 740 );
}
add_action( 'after_setup_theme', 'elakisto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elakisto_widgets_init() {

	// Define sidebars
	$sidebars = array(
		'sidebar-1' => esc_html__( 'Sidebar', 'elakisto' ),
		'sidebar-2' => esc_html__( 'Footer Widgets', 'elakisto' ),
	);

	// Loop through each sidebar and register
	foreach ( $sidebars as $sidebar_id => $sidebar_name ) {
		register_sidebar( array(
			'name'          => $sidebar_name,
			'id'            => $sidebar_id,
			'description'   => sprintf ( esc_html__( 'Widget area for %s', 'elakisto' ), $sidebar_name ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'elakisto_widgets_init' );


/**
 * Registers an editor stylesheet for the theme.
 */
function elakisto_add_editor_styles() {

	add_editor_style( 'editor.css' );
}
add_action( 'admin_init', 'elakisto_add_editor_styles' );

/**
* Enqueue editor styles for Gutenberg
*/

function elakisto_editor_styles() {
	wp_enqueue_style( 'elakisto-editor-style', get_template_directory_uri() . '/editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'elakisto_editor_styles' );

/**
 * Enqueue scripts and styles.
 */
function elakisto_scripts() {

	// Google Fonts
	wp_enqueue_style( 'elakisto-font-enqueue', elakisto_font_url(), array(), null );

	// Main theme style
	wp_enqueue_style( 'elakisto-style', get_stylesheet_uri() );


	elakisto_custom_logo_size();

	// Change Colors Style
	$change_colors_style = wp_strip_all_tags( elakisto_change_colors() );
	wp_add_inline_style( 'elakisto-style', $change_colors_style );

	// Theme scripts
	//wp_deregister_script('jquery');
	//wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), null, true);
	wp_enqueue_script( 'elakisto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'elakisto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//wp_enqueue_script( 'elakisto-slick-slider', get_template_directory_uri() . '/js/slick/slick.js', array(), false, true );

	// Main JS file
	wp_enqueue_script( 'elakisto-call-scripts', get_template_directory_uri() . '/js/common.js', array( 'jquery', 'masonry' ), false, true );

	// LightGallery
	wp_enqueue_style( 'elakisto-lg-css', get_theme_file_uri( 'assets/vendor/lightgallery/css/lightgallery.css' ), array( 'elakisto-style' ) );
	wp_enqueue_script( 'elakisto-lg', get_theme_file_uri( 'assets/vendor/lightgallery/js/lightgallery.all.min.js' ), array() );
	wp_enqueue_script( 'elakisto-lg-video', get_theme_file_uri( 'assets/vendor/lightgallery/js/lg-video.min.js' ), array() );
	wp_enqueue_script( 'elakisto-lg-video-vimeo', 'https://f.vimeocdn.com/js/froogaloop2.min.js', array() );

}
add_action( 'wp_enqueue_scripts', 'elakisto_scripts' );

/**
 * Enqueue admin scripts
 */
function elakisto_add_admin_scripts() {
	// Admin styles
	wp_enqueue_style( 'elakisto-admin-css', get_template_directory_uri() . '/inc/admin/admin.css' );

	// Admin scripts
	wp_enqueue_media();
	wp_enqueue_script( 'my-upload' );
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'elakisto-admin-js', get_template_directory_uri() . '/inc/admin/admin.js' );

	wp_enqueue_style( 'elakisto-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );

}
add_action( 'admin_enqueue_scripts', 'elakisto_add_admin_scripts' );

/**
 * Adds theme default Google Fonts
 */
function elakisto_font_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by SK Modernist, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$barlow    = esc_html_x( 'on', 'Roboto font: on or off', 'elakisto' );

	if ( 'off' === $barlow ) {

		return;

	} else {

		$font_families = array();

		$font_families[] = 'Roboto:300,400,400i,500,700';

		$query_args = array(
			'family' => implode( '|', $font_families ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$google_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		return $google_fonts_url;

	}
}

// add resize logo code to header
function elakisto_custom_logo_size() {

	if(class_exists( 'Kirki' )){
		$logo_size_percent = Kirki::get_option( 'elakisto', 'size_logo' );
	} else {
		$logo_size_percent = 100;
	}

	$add_data = '
	.custom-logo-link img {
		max-width: ' . $logo_size_percent . '%;
	}';

	wp_add_inline_style( 'elakisto-style', $add_data );
}

/**
 * Customize colors.
 */
require get_template_directory() . '/inc/change-colors.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load plugin activation script file.
 */
require get_template_directory() . '/inc/plugin-activation.php';
