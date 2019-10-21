<?php
/**
 * Customization of Newsletter
 *
 * @package elakisto
 */


/* --- Settings --- */

$wp_customize->add_setting( 'newsletter_toggle', array(
    'default'           => 1,
    'sanitize_callback' => 'elakisto_sanitize_select'
) );

$wp_customize->add_control( 'newsletter_toggle', array(
    'label'    => esc_attr__( 'Display newsletter form in the pre-footer area', 'elakisto' ),
    'description' => esc_attr__( 'Customize in Settings > MailChimp Setup', 'elakisto' ),
    'section'  => 'footer_section',
    'priority' => 1,
    'type'     => 'checkbox'
) );

// Divider
$wp_customize->add_setting( 'elakisto_divider_2', array(
    'sanitize_callback' => 'elakisto_sanitize_text',
) );

// Divider
$wp_customize->add_control( new WP_Customize_Divider_Control(
    $wp_customize,
    'elakisto_divider_2',
        array(
            'section'  => 'footer_section',
            'priority' => 2
        )
) );
