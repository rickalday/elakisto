<?php
/**
 * Customization of Shop
 *
 * @package elakisto
 */

Kirki::add_config( 'elakisto', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
	'option_name'   => 'elakisto',
) );

/**
 * Section
 */

Kirki::add_section( 'call_action_settings', array(
	'title'          => esc_html__( 'Home Page Settings', 'elakisto' ),
	'priority' => 2,
	'panel'    => 'theme_options_panel'
) );



/**
 * Settings
 */

Kirki::add_field( 'elakisto', array(
	'type'        => 'toggle',
	'settings'    => 'front_toggle',
	'label'       => esc_attr__( 'Enable Home Section', 'elakisto' ),
	'section'     => 'call_action_settings',
	'default'     => 0,
	'priority'    => 1,
) );

Kirki::add_field( 'elakisto', array(
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Modules', 'elakisto' ),
	'section'     => 'call_action_settings',
	'priority'    => 10,
	'row_label' => array(
		'type'  => 'field',
		'value' => esc_attr__('Module', 'elakisto' ),
		'field' => 'action_title',
	),
	'active_callback'    => array(
		array(
			'setting' => 'front_toggle',
			'value'   => '1',
			'operator'=> '==',
		),
	),
	'settings'    => 'front_action',
	'default'     => array(
		array(
			'action_type'         => 'none',
			'action_title'        => 'Title',
			'action_category'     => '',
			'action_slider_style' => 'two',
			'action_archive_style'=> 'side',
			'action_portfolio_archive_style'=> 'thumbs',
			'action_number'       => 8,
			'action_cta_image'    => '',
			'action_cta_text'     => '',
			'action_cta_link'     => '',
			'action_cta_button'   => '',
			//'action_page_select'  => '',

		)
	),
	'fields' => array(
		'action_type' => array(
			'type'        => 'radio',
			'label'       => __( 'Module Type', 'elakisto' ),
			'default'     => '',
			'choices'     => array(
				'archive' => esc_attr__( 'Archive', 'elakisto' ),
				'cta' => esc_attr__( 'Call to Action', 'elakisto' ),
				'portfolio-archive' => esc_attr__( 'Portfolio Archive', 'elakisto' ),
			),
		),
		'action_title' => array(
			'type'     => 'text',
			'label'    => __( 'Title', 'elakisto' ),
			'description' => __( 'Title for this element', 'elakisto' ),
			'sanitize_callback' => 'wp_kses_post',
			'default'  => '',
		),

		// cateogry
		'action_category' => array(
			'type'        => 'select',
			'label'       => __( 'Categories', 'elakisto' ),
			'description' => __( 'Select category to be displayed in this element', 'elakisto' ),
			'default'     => 0,
			'choices'     => $categories,
		),

		// slider
		'action_slider_style' => array(
			'type'        => 'radio',
			'label'       => __( 'Slider Style', 'elakisto' ),
			'description' => __( 'Choose style of this slider', 'elakisto' ),
			'default'     => 'two',
			'choices'     => array(
				'two' => esc_attr__( 'Film Strip', 'elakisto' ),
				'side' => esc_attr__( 'Classic', 'elakisto' ),
				'float' => esc_attr__( 'Horizontal', 'elakisto' ),
			),
		),

		// archive
		'action_archive_style' => array(
			'type'        => 'radio',
			'label'       => __( 'Archive Style', 'elakisto' ),
			'description' => __( 'Choose style of this archive', 'elakisto' ),
			'default'     => 'side',
			'choices'     => array(
				'side'    => esc_attr__( 'Two Column', 'elakisto' ),
				'masonry' => esc_attr__( 'Masonry', 'elakisto' ),
				'list'    => esc_attr__( 'List', 'elakisto' ),
			),
		),

		// porfolio archive
		'action_portfolio_archive_style' => array(
			'type'        => 'radio',
			'label'       => __( 'Portfolio Archive Style', 'elakisto' ),
			'description' => __( 'Choose style of this archive', 'elakisto' ),
			'default'     => 'thumbs',
			'choices'     => array(
				'thumbs'    => esc_attr__( 'Thumbnails', 'elakisto' ),
				'grid' => esc_attr__( 'Grid', 'elakisto' ),
				'title'    => esc_attr__( 'Title Only', 'elakisto' ),
			),
		),

		'action_number' => array(
			'type'     => 'number',
			'label'    => __( 'Number of Posts', 'elakisto' ),
			'description' => __( 'Select from 1 to 20', 'elakisto' ),
			'default'  => 8,
			'choices'     => array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1,
			),
		),

		// CTA
		'action_cta_image' => array(
			'type'     => 'image',
			'label'    => __( 'Call to Action Image', 'elakisto' ),
			'default'  => '',
		),
		'action_cta_text' => array(
			'type'     => 'textarea',
			'label'    => __( 'Call to Action Text', 'elakisto' ),
			'sanitize_callback' => 'wp_kses_post',
			'default'  => '',
		),
		'action_cta_link' => array(
			'type'     => 'link',
			'label'    => __( 'Call to Action Link', 'elakisto' ),
			'description' => __( 'Leave empty if you don&#39;t want link', 'elakisto' ),
			'default'  => '',
		),
		'action_cta_button' => array(
			'type'     => 'text',
			'label'    => __( 'Call to Action Button Text', 'elakisto' ),
			'default'  => '',
		),

		// Promo Pages
		/*
		'action_page_select' => array(
			'type'     => 'select',
			'label'    => __( 'Promo Page', 'elakisto' ),
			'multiple'    => 3,
			'default'  => '',
			'choices'     => Kirki_Helper::get_posts(
				array(
					'post_type'      => 'page'
				)
			),
		),
		*/
	),
) );
