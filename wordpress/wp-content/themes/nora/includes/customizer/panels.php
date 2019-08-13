<?php

/**general panel
 * @package nora
 */

$wp_customize->add_panel( 'homepage_panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => __('Homepage Setting', 'nora'),
    'description'    => __('Homepage Setting', 'nora'),
));

$wp_customize->add_panel( 'style_panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => __('Style Settings', 'nora'),
    'description'    => __('Change Style of Site', 'nora'),
));


$wp_customize->add_panel( 'shop_panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => __('Woocommerce Setting', 'nora'),
    'description'    => __('Woocommerce Setting', 'nora'),
));


$wp_customize->add_panel( 'footer_panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => __('Footer Setting', 'nora'),
    'description'    => __('Footer Setting', 'nora'),
));


// slider setting
$wp_customize->add_panel( 'slider_setting', array(
  'priority'        =>      '30',
  'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Slider Setting', 'nora' ),
    'description' => __( 'This allows to edit the Slider', 'nora' ),
));