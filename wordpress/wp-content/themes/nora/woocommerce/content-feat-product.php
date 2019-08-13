<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<div <?php post_class( $classes ); ?>>
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="item-img">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</a>
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
	              <a class="item-wishlist" href="<?php echo esc_url( $url ) ?>"><i class="fa fa-heart"></i></a>
	              <?php
	          }
	        ?>
	        <a href="<?php the_post_thumbnail_url(); ?>" rel="nofollow" class="zoom"><i class="fa fa-search-plus"></i></a>
        
        </div>
    </div>
</div>
