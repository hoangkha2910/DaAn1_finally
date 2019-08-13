<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = get_option( 'template' );

switch( $template ) {
	case 'nora' :
		echo '<div id="woocommerce">';

			if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<section id="header-meta" class="clearfix">
					<div class="wrap clearfix">
						<h1 class="page-title"> <?php woocommerce_page_title(); ?> </h1>
						<?php
							/**
							 * woocommerce_before_main_content hook.
							 *
							 * @hooked woocommerce_breadcrumb - 20
							*/
							if ( !function_exists( 'woocommerce_breadcrumb' ) ) { 
							    require_once get_template_directory().'/includes/wc-template-functions.php'; 
							} 
							  
							// The args. 
							$args = array(
								'delimiter'  => ' &#47; ',
					            'wrap_before'  => '<div id="breadcrumb">',
					            'wrap_after' => '</div>',
					            'before'   => '',
					            'after'   => '',
							); 
							  
							// NOTICE! Understand what this does before running. 
							$result = woocommerce_breadcrumb($args);
						?>
					</div>
				</section>

			<?php endif;

		echo '<div role="main" class="wrap nora clearfix">';
		break;
	default :
		echo '<div id="woocommerce"><div class="wrap nora clearfix" role="main">';
		break;
}