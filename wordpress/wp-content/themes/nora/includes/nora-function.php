<?php
// display ticker function
function nora_ticker_header_customizer() {
	//Check if ticker is enabled
	if( get_theme_mod('nora_ticker_checkbox', 0 ) == 1) {
		$ticker_title = get_theme_mod('nora_ticker_title');
		if(empty( $ticker_title ) ){ $ticker_title = "Latest"; }
		$category_id = get_theme_mod( 'nora_ticker_text' );
		if( ! empty( $category_id ) ) {
			$args = array(
				'posts_per_page' => -1,
				'category_name' => esc_html( get_cat_name( absint( $category_id ) ) )

			);
			$ticker_array = get_posts( $args ); ?>
			<ul id="ticker">
				<?php 
					$i=0;
					foreach( $ticker_array as $key => $ticker ) {
						$i++;
						?>
						<li>
							<h5 class="ticker_tick ticker-h5-<?php echo esc_attr( $i ); ?>"> <?php echo esc_html( $ticker->post_title ); ?> </h5>
						</li>
						<?php 
					} 
				?>
			</ul>
		<?php }	
	}
}

function nora_as_before_top_header_enabled() {
	if ( is_user_logged_in() || get_theme_mod( 'nora_ticker_checkbox' ) === 1 ) {
		return true;
	} else {
		return false;
	}
}


// slider funciton that take parameter from customizer to display post slider
function nora_slidercb() { 
	$nora_show_slider = get_theme_mod('show_slider', 0 ) ;
	$nora_show_caption = get_theme_mod('show_caption',0 ) ;
	if( $nora_show_slider == 1 ) :
		?>
	<section id="main-slider">
		<div class="bx-slider">
			<?php
			for ($i=1; $i <= 5 ; $i++) { 
				$slider_post = get_theme_mod('slider_'.$i.'_post');
				$slider_button_text = get_theme_mod( 'slider' . $i . '_button_text' );
				$slider_button_link = get_theme_mod( 'slider' . $i . '_button_link' );

				if( ! empty( $slider_post ) ) :
					?>
				<div class="slides">
					<?php
					$args = array('post__in'=> array( $slider_post ) );
					$query1 = new WP_Query( $args );
					while ( $query1->have_posts() ) {
						$query1->the_post();
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'nora-slider', true);
						?>
						<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>"/>
						
						<?php if( $nora_show_caption == '1' ): ?>
							<div class="slider-caption">
								<div class="nora-container">
									
									<div class="caption-content-wrapper">
										<h2 class="caption-title"><?php the_title(); ?></h2>
										<div class="caption-content">
											<?php echo wp_trim_words( get_the_content(), '165', '...'); ?>
										</div>
									</div>

									<?php if($slider_button_text): ?>
										<a class="caption-read-more1" href="<?php echo esc_url($slider_button_link); ?>"><?php echo esc_html($slider_button_text); ?></a>
									<?php endif; ?>

								</div>
							</div>
						<?php endif; ?>
						<?php
					}
					wp_reset_postdata();
					?>
				</div>
				<?php 
				endif; ?>
				<?php 
			} ?>

		</div>
		<?php  
		endif; ?>
	</section>
	<?php
}
add_action('nora_slickslider','nora_slidercb', 10);


// header shop menu at top bar
function nora_header_shop_menu(){ ?>
	
	<div class="quick_shop">
		<ul>
			<li class="nora_woocommerce_shop_account">
    			<a href="" title="<?php esc_attr_e( 'My Account', 'nora' ); ?>"><i class="fa fa-user"></i></a>
    		</li>
    		<li class="nora_woocomerce_checkout">
    			<a href="" title="<?php esc_attr_e( 'Checkout', 'nora' ); ?>"><i class="fa fa-cart-arrow-down"></i></a>
    		</li>
    		<li class="nora_woocommerce_wishlist">
    			<a href="" title="<?php esc_attr_e( 'Wishlist', 'nora' ); ?>"><i class="fa fa-heart"></i></a>
    		</li>
    		<li class="nora_woocommerce_mini_cart">
    			<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View Cart', 'nora' ); ?>"><i class="fa fa-shopping-cart"></i> <?php echo sprintf (_n( '<span class="mini-cart-item-total">( %d )</span>', '<span class="mini-cart-item-total">( %d )</span>', WC()->cart->get_cart_contents_count() , 'nora' ), WC()->cart->get_cart_contents_count()  ); ?></a>
    			<ul class="nora_mini-cart">
    				<li>
    					<?php
			    			if ( !function_exists( 'woocommerce_mini_cart' ) ) { 
								    require_once get_template_directory().'/includes/wc-template-functions.php'; 
								} 
								$args = '';
								$result = woocommerce_mini_cart($args);
			    		?>
    				</li>
    			</ul>
    		</li>
    	</ul>
    </div>
	
<?php
// endif;
}
add_action('nora_header_shop_menu_item','nora_header_shop_menu', 10);

if ( ! function_exists( 'nora_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Nora
 */
function nora_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
