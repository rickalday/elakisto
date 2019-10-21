<?php
/**
 * Customization of Single
 *
 * @package Elakisto
 */

/**
 * Section
 */
$wp_customize->add_section( 'single_settings', array(
    'title'    => esc_html__( 'Single Post Settings', 'elakisto' ),
    'priority' => 120,
    'panel'    => 'theme_options_panel'
) );

/**
 * Settings
 */

$wp_customize->add_setting( 'single_navigation', array(
    'default'           => 1,
    'sanitize_callback' => 'elakisto_sanitize_select'
) );

$wp_customize->add_control( 'single_navigation', array(
    'label'    => esc_attr__( 'Display Navigation for Prev/Next Post', 'elakisto' ),
    'section'  => 'single_settings',
    'priority' => 1,
    'type'     => 'checkbox'
) );
