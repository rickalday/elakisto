<?php
/**
 * Customizer Custom CSS
 *
 * Here you can define your own CSS rules
 *
 * @package  Elakisto
 */

/**
 * Section
 */
$wp_customize->add_section( 'footer_section', array(
    'title'    => esc_html__( 'Footer Settings', 'elakisto' ),
    'panel'    => 'theme_options_panel',
    'priority' => 210
) );


/**
 * Section
 */

// Enable Instagram Section
$wp_customize->add_setting( 'instagram_enable', array(
    'default'           => 0,
    'sanitize_callback' => 'elakisto_sanitize_select'
) );

$wp_customize->add_control( 'instagram_enable', array(
    'label'    => esc_html__( 'Enable Instagram section in the pre-footer area', 'elakisto' ),
    'section'  => 'footer_section',
    'priority' => 3,
    'type'     => 'checkbox'
) );

// Instagram username
$wp_customize->add_setting( 'instagram_username', array(
    'default'           => '',
    'sanitize_callback' => 'elakisto_sanitize_text'
) );

$wp_customize->add_control( 'instagram_username', array(
    'label'    => esc_html__( 'Instagram username', 'elakisto' ),
    'section'  => 'footer_section',
    'priority' => 4,
    'type'     => 'text'
) );

// Divider
$wp_customize->add_setting( 'elakisto_divider_1', array(
    'sanitize_callback' => 'elakisto_sanitize_text',
) );

// Divider
$wp_customize->add_control( new WP_Customize_Divider_Control(
    $wp_customize,
    'elakisto_divider_1',
        array(
            'section'  => 'footer_section',
            'priority' => 5
        )
) );


// Footer Copyright text
$wp_customize->add_setting( 'elakisto_footer_copyright', array(
    'default'           => '',
    'sanitize_callback' => 'elakisto_sanitize_text',
) );

$wp_customize->add_control( 'elakisto_footer_copyright', array(
    'label'    => esc_html__( 'Footer Copyright Text', 'elakisto' ),
    'section'  => 'footer_section',
    'priority' => 10,
    'settings' => 'elakisto_footer_copyright',
    'type'     => 'textarea'
) );
