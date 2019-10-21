<?php
/**
 * Customization of Archives
 *
 * @package Elakisto
 */

/**
 * Section
 */
$wp_customize->add_section( 'archive_settings', array(
    'title'    => esc_html__( 'Archive Settings', 'elakisto' ),
    'priority' => 140,
    'panel'    => 'theme_options_panel'
) );

/**
 * Settings
 */

// archive template layout
$wp_customize->add_setting( 'archive_layout_setting', array(
    'default'           => 'side',
    'sanitize_callback' => 'elakisto_sanitize_archive_layout'
) );

$wp_customize->add_control( 'archive_layout_setting', array(
    'label'       => esc_html__( 'Archive Style', 'elakisto' ),
    'priority'    => 0,
    'section'     => 'archive_settings',
    'type'        => 'radio',
    'choices'     => array(
    	'side'    => esc_attr__( 'Two column', 'elakisto' ),
        'masonry' => esc_attr__( 'Masonry', 'elakisto' ),
        'list'    => esc_attr__( 'List', 'elakisto' ),
    ),
) );
