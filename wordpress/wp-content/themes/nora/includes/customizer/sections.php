<?php
/**
 * Add sections
 * @package nora
 */

/**
 * HomePage Section
 *
*/
$wp_customize->add_section( 'homepage_intro_section', array(
	'title'			=> __('Intro Section', 'nora'),
	'priority'		=> 30,
	'panel'			=> 'homepage_panel'
) );

$wp_customize->add_section( 'nora_homepage_featured_post', array(
  'title'     => __('Featured Post', 'nora'),
  'priority'    => 30,
  'panel'     => 'homepage_panel'
) );

/**
 * style section
 *
*/
$wp_customize->add_section( 'style_section', array(
	'title'			=> __('Style', 'nora'),
	'priority'		=> 30,
	'panel'			=> 'style_panel'
) );

/**
 * Shop Page Setting Section
 *
*/
// check if woocommerce is active or not
if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->add_section( 'shop_page_section', array(
		'title'			=> __('Shop Page Layout', 'nora'),
		'priority'		=> 30,
		'panel'			=> 'shop_panel'
	) );
}

/**
 * Footer Section
 *
*/
$wp_customize->add_section( 'copyright_section', array(
	'title'			=> __('Copyright', 'nora'),
	'priority'		=> 30,
	'panel'			=> 'footer_panel'
) );

// ticekr section
$wp_customize->add_section( 'nora_ticker', array(
    'title'           =>      __('Ticker Setting', 'nora'),
    'priority'        =>      '20',
));

// slider setting
$wp_customize->add_section( 'slider_basic', array(
    'title'           =>      __('Basic Slider Settings', 'nora'),
    'priority'        =>      '2',
      'description' => esc_html__( 'This setting will  only effect homepage, if you wish to add on different pages you can work with action hook called: \'nora_slickslider\' ', 'nora' ),
    'panel' => 'slider_setting'
));

$wp_customize->add_section( 'slider_1', array(
  'title'           =>      __('Slider 1', 'nora'),
  'priority'        =>      '2',
  'panel' => 'slider_setting'
));

$wp_customize->add_section( 'slider_2', array(
  'title'           =>      __('Slider 2', 'nora'),
  'priority'        =>      '2',
  'panel' => 'slider_setting'
));
                        
$wp_customize->add_section( 'slider_3', array(
  'title'           =>      __('Slider 3', 'nora'),
  'priority'        =>      '2',
  'panel' => 'slider_setting'
));
                        
$wp_customize->add_section( 'slider_4', array(
  'title'           =>      __('Slider 4', 'nora'),
  'priority'        =>      '2',
  'panel' => 'slider_setting'
));

$wp_customize->add_section('slider_5', array(
  'title'           =>      __('Slider 5', 'nora'),
  'priority'        =>      '2',
  'panel' => 'slider_setting'
));