<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
} ?>
<li <?php post_class(); ?>>
    <div class="nora_wc_product">
    	<?php
    		if ( !function_exists( 'woocommerce_show_product_loop_sale_flash' ) ) { 
			    require_once get_template_directory().'/wc-template-functions.php'; 
			} 
			 
			  
			// NOTICE! Understand what this does before running. 
			$result = woocommerce_show_product_loop_sale_flash(); 
    	?>
        <a href="<?php the_permalink(); ?>" class="product_link">
	        <?php
	            if ( !function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) { 
					    require_once get_template_directory().'/wc-template-functions.php'; 
					} 
					 
					  
					// NOTICE! Understand what this does before running. 
					$result = woocommerce_template_loop_product_thumbnail(); 
	        ?>
        </a>
        
    <div class="product_detail clearfix">
        <h3><?php the_title(); ?></h3>
        <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_price - 10
             */
        	if ( !function_exists( 'woocommerce_template_loop_price' ) ) { 
                require_once get_template_directory().'/wc-template-functions.php'; 
            } 
             
              
            // NOTICE! Understand what this does before running. 
            $result = woocommerce_template_loop_price(); 
        ?>
    </div>
            <!-- <p class="short_desc"><?php echo get_the_excerpt(); ?></p> -->
        <div class="add_product_to">
        	<div class="icon_link">
            <?php
                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action('woocommerce_after_shop_loop_item');

                // add to wishlist

	            if (function_exists('YITH_WCWL')) {
	                $url = add_query_arg('add_to_wishlist', $product->get_id() );
	                ?>
	                <a class="item-wishlist" href="<?php echo $url ?>"><i class="fa fa-heart"></i></a>
	                <?php
	            }
            ?>
            <a href="<?php the_post_thumbnail_url(); ?>" rel="nofollow" class="zoom"><i class="fa fa-search-plus"></i></a>
            
            </div>
        </div>
    </div>
</li>