<?php
/**
 * Customizer Logo Size Setting
 *
 * @package elakisto
 */


Kirki::add_field( 'elakisto', array(
    'type'        => 'slider',
    'settings'    => 'size_logo',
    'label'       => __( 'Logo Size', 'elakisto' ),
    'section'     => 'title_tagline',
    'priority'    => 8,
    'default'     => 50,
    'choices'     => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 10,
    ),
    'active_callback' => 'has_custom_logo',
) );
