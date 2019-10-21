<?php
/**
 * Customize Google Fonts
 *
 * @package elakisto
 */

/* --- Section --- */

Kirki::add_section( 'google_fonts_section', array(
    'title'       => esc_html__( 'Font Settings', 'elakisto' ),
    'panel'   	  => 'theme_options_panel',
    'description' => esc_html__( 'Choose fonts for your content', 'elakisto' ),
    'priority'    => 210
) );

/* --- Settings --- */
Kirki::add_field( 'elakisto', array(
	'type'        => 'typography',
	'settings'    => 'font_paragraph_settings',
	'label'       => esc_attr__( 'Paragraphs', 'elakisto' ),
	'section'     => 'google_fonts_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body, .sharedaddy-holder div.sharedaddy h3.sd-title',
		),
	),
) );

Kirki::add_field( 'elakisto', array(
	'type'        => 'typography',
	'settings'    => 'font_heading_settings',
	'label'       => esc_attr__( 'Headings', 'elakisto' ),
	'section'     => 'google_fonts_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 20,
	'output'      => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6, .title, .footer-newsletter .mc_custom_border_hdr, .footer-newsletter #mc_subheader, .single-navigation-wrapper .post-nav-title, .widget_recent_entries li > a, .recentcomments > a, .single .entry-header h1, .page:not(.page-template) .entry-header h1, h2.entry-title, .comment-list .fn, .page-header-top h1',
		),
	),
) );

Kirki::add_field( 'elakisto', array(
	'type'        => 'typography',
	'settings'    => 'font_nav_settings',
	'label'       => esc_attr__( 'Navigation', 'elakisto' ),
	'section'     => 'google_fonts_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 20,
	'output'      => array(
		array(
			'element' => '.site-title, .social-button, .social-wrapper, .main-navigation ul, .menu-close, .search-wrap',
		),
	),
) );
