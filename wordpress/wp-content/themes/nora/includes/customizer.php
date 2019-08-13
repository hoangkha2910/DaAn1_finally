<?php
/**
 * Nora Theme Customizer.
 *
 * @package nora
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function nora_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title',
			'container_inclusive' => false,
			'render_callback' => 'nora_customize_partial_blogname',
		) );
	}
	
	require get_template_directory() . '/includes/customizer/panels.php';
	require get_template_directory() . '/includes/customizer/sections.php';
	require get_template_directory() . '/includes/customizer/control.php';
}
add_action( 'customize_register', 'nora_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nora_customize_preview_js() {
	wp_enqueue_script( 'nora-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'nora_customize_preview_js' );

/**
* @return add st-admin.css on customizer page
*/
add_action( 'customize_controls_print_styles', 'nora_add_styles_on_customizer' );
function nora_add_styles_on_customizer() {
	wp_enqueue_style( 'nora-customizer-style', get_template_directory_uri() . '/css/st-admin.css' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since nora 1.0
 * @see nora_customize_partial_blogname()
 *
 * @return void
 */
function nora_customize_partial_blogname() {

	bloginfo( 'name' );
}

