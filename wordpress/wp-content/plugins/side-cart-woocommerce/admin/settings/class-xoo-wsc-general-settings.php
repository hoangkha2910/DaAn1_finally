<?php

/**
 * Admin Part of Plugin, dashboard and options.
 *
 * @package    WooCommerce Side Cart
 */
class xoo_wsc_General_Settings extends xoo_wsc_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0 
	 * @access   private
	 * @var      string    $xoo_wsc    The ID of this plugin.
	 */
	private $xoo_wsc;

	/**
	 * The ID of General Settings.
	 *
	 * @since    1.0.0 
	 * @access   private
	 * @var      string    $group    The ID of General Settings.
	 */
	private $group;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $xoo_wsc     The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $xoo_wsc ) {

		$this->xoo_wsc = $xoo_wsc;
		$this->group = $xoo_wsc.'-gl';
	}

	/**
	 * Creates our settings sections with fields etc. 
	 *
	 * @since    1.0.0
	 */
	public function settings_api_init(){
		
		// register_setting( $option_group, $option_name, $settings_sanitize_callback );
		register_setting(
			$this->group . '-options',
			$this->group . '-options',
			array( $this, 'settings_sanitize' )
		);

		// add_settings_section( $id, $title, $callback, $menu_slug );
		add_settings_section(
			$this->group . '-sc-options', // section
			'',
			array( $this, 'sc_options_section' ),
			$this->group // Side Cart Section
		);

		add_settings_section(
			$this->group . '-bk-options', // section
			'',
			array( $this, 'bk_options_section' ),
			$this->group // Cart Basket Section
		);

		/*
		 =============================================
		 ============= Side Cart Fields ==============
		 =============================================
		*/

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );
		add_settings_field(
			'sc-auto-open',
			 __( 'Auto Open', 'side-cart-woocommerce' ),
			array( $this, 'sc_auto_open' ),
			$this->group,
			$this->group . '-sc-options' // Auto Open Side Cart
		);

		add_settings_field(
			'sc-ajax-atc',
			 __( 'Ajax Add to Cart', 'side-cart-woocommerce' ),
			array( $this, 'sc_ajax_atc' ),
			$this->group,
			$this->group . '-sc-options' // ajax add to cart
		);

		add_settings_field(
			'sc-atc-icons',
			 __( 'Loading Icon', 'side-cart-woocommerce' ),
			array( $this, 'sc_atc_icons' ),
			$this->group,
			$this->group . '-sc-options' // show icons on add to cart
		);

		add_settings_field(
			'sc-head-text',
			 __( 'Head Title', 'side-cart-woocommerce' ),
			array( $this, 'sc_head_text' ),
			$this->group,
			$this->group . '-sc-options' // Cart Head Text
		);


		add_settings_field(
			'sc-shipping-text',
			 __( 'Shipping Text', 'side-cart-woocommerce' ),
			array( $this, 'sc_shipping_text' ),
			$this->group,
			$this->group . '-sc-options' // Shipping Text
		);

		add_settings_field(
			'sc-cart-text',
			 __( 'Cart Button Text', 'side-cart-woocommerce' ),
			array( $this, 'sc_cart_text' ),
			$this->group,
			$this->group . '-sc-options' // Cart Button Text
		);

		add_settings_field(
			'sc-checkout-text',
			 __( 'Checkout Button Text', 'side-cart-woocommerce' ),
			array( $this, 'sc_checkout_text' ),
			$this->group,
			$this->group . '-sc-options' // Checkout Button Text
		);

		add_settings_field(
			'sc-continue-text',
			 __( 'Continue Button Text', 'side-cart-woocommerce' ),
			array( $this, 'sc_continue_text' ),
			$this->group,
			$this->group . '-sc-options' // Continue Button Text
		);


		add_settings_field(
			'sc-show-ptotal',
			 __( 'Product total', 'side-cart-woocommerce' ),
			array( $this, 'sc_show_ptotal' ),
			$this->group,
			$this->group . '-sc-options' // Product total
		);

		add_settings_field(
			'sc-cart-redirect',
			 __( 'Redirect to Cart', 'side-cart-woocommerce' ),
			array( $this, 'sc_cart_redirect' ),
			$this->group,
			$this->group . '-sc-options' // Product total
		);


		/*
		 =============================================
		 ============= Cart Basket Fields ============
		 =============================================
		*/

		add_settings_field(
			'bk-show-basket',
			 __( 'Enable Basket', 'side-cart-woocommerce' ),
			array( $this, 'bk_show_basket' ),
			$this->group,
			$this->group . '-bk-options' // Cart Basket
		);

		add_settings_field(
			'bk-show-basket-mobile',
			 __( 'Basket on mobile', 'side-cart-woocommerce' ),
			array( $this, 'bk_show_basket_mobile' ),
			$this->group,
			$this->group . '-bk-options' // Cart Basket
		);

		add_settings_field(
			'bk-hide-basket-pages',
			 __( 'Hide Basket Pages', 'side-cart-woocommerce' ),
			array( $this, 'bk_hide_basket_pages' ),
			$this->group,
			$this->group . '-bk-options' // Cart Basket
		);

		add_settings_field(
			'bk-show-bkcount',
			 __( 'Product Count', 'side-cart-woocommerce' ),
			array( $this, 'bk_show_bkcount' ),
			$this->group,
			$this->group . '-bk-options' // Product Count
		);
	}

	/**
	 * Creates a settings section
	 *
	 * @since 		1.0.0
	 * @return 		mixed 						The settings section
	 */
	public function sc_options_section() {
		$this->get_section_markup('Side Cart');

	} 


	/**
	 * Creates a basket section
	 *
	 * @since 		1.0.0
	 * @return 		mixed 						The settings section
	 */
	public function bk_options_section() {
		$this->get_section_markup('Cart Basket');
	} 


	/*
	 =============================================
	 ============= Side Cart Section =============
	 =============================================
	*/

	/**
	 * Enable Bar Field
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_auto_open() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-auto-open']) ? $options['sc-auto-open'] : 1;
		$id 		= $this->group.'-options[sc-auto-open]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Auto open side cart when item is added to cart.</label> <?php
	}

	/**
	 * Enable Ajax add to cart
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_ajax_atc() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-ajax-atc']) ? $options['sc-ajax-atc'] : 0;
		$id 		= $this->group.'-options[sc-ajax-atc]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Add to cart without page refresh.</label> <?php
	}

	/**
	 * Show icons while adding to cart
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_atc_icons() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-atc-icons']) ? $options['sc-atc-icons'] : 1;
		$id 		= $this->group.'-options[sc-atc-icons]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Show preloader/check icon while adding to cart.</label> <?php
	}  


	/**
	 * Head Title
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_head_text() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-head-text']) ? $options['sc-head-text'] : __('Your Cart','side-cart-woocommerce');

		?>
		<input type="text" value="<?php echo $option; ?>" name="<?php echo $this->group; ?>-options[sc-head-text]" />
		<?php
	}




	/**
	 * Shipping text
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_shipping_text() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-shipping-text']) ? $options['sc-shipping-text'] : __('To find out your shipping cost , Please proceed to checkout.','side-cart-woocommerce');

		?>
		<input type="text" value="<?php echo $option; ?>" name="<?php echo $this->group; ?>-options[sc-shipping-text]" />
		<?php
	}


	/**
	 * Cart text
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_cart_text() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-cart-text']) ? $options['sc-cart-text'] : __('View Cart','side-cart-woocommerce');

		?>
		<input type="text" value="<?php echo $option; ?>" name="<?php echo $this->group; ?>-options[sc-cart-text]" />
		<?php
	}

	/**
	 * Checkout text
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_checkout_text() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-checkout-text']) ? $options['sc-checkout-text'] : __('Checkout','side-cart-woocommerce');

		?>
		<input type="text" value="<?php echo $option; ?>" name="<?php echo $this->group; ?>-options[sc-checkout-text]" />
		<?php
	}


	/**
	 * Continue text
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_continue_text() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-continue-text']) ? $options['sc-continue-text'] : __('Continue Shopping','side-cart-woocommerce');

		?>
		<input type="text" value="<?php echo $option; ?>" name="<?php echo $this->group; ?>-options[sc-continue-text]" />
		<p class="description">Leave empty to disable</p>
		<?php
	}




	/**
	 * Product Total
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_show_ptotal() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-show-ptotal']) ? $options['sc-show-ptotal'] : 1;
		$id 		= $this->group.'-options[sc-show-ptotal]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Show Product Total.</label>
		<?php
	}


	/**
	 * Product Total
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function sc_cart_redirect() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['sc-cart-redirect']) ? $options['sc-cart-redirect'] : 0;
		$id 		= $this->group.'-options[sc-cart-redirect]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="0">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Redirect to the cart page after successful addition.</label>
		<?php
	}


	/*
	 =============================================
	 ============ Cart Basket Section ============
	 =============================================
	*/


	/**
	 * Enable Cart Basket
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function bk_show_basket() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['bk-show-basket']) ? $options['bk-show-basket'] : 1;
		$id 		= $this->group.'-options[bk-show-basket]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Show Cart Basket.</label>
		<?php
	}


	/**
	 * Basket on mobile devices
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function bk_show_basket_mobile() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['bk-show-basket-mobile']) ? $options['bk-show-basket-mobile'] : 1;
		$id 		= $this->group.'-options[bk-show-basket-mobile]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Show basket on mobile device (smartphone,tablet).</label>
		<?php
	}


	/**
	 * Hide Basket on pages
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function bk_hide_basket_pages() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['bk-hide-basket-pages']) ? $options['bk-hide-basket-pages'] : '';
		$id 		= $this->group.'-options[bk-hide-basket-pages]';
		?>
		<input type="text" value="<?php echo $option; ?>" name="<?php echo $id; ?>" />
		<label for="<?php echo $id; ?>">Do not show basket on pages.</label>
		<p class="description">Use page id/slug separated by comma. For eg: contact-us,about-us</p>
		<?php
	}


	/**
	 * Product Count
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function bk_show_bkcount() {

		$options 	= get_option( $this->group . '-options' );
		$option 	= isset( $options['bk-show-bkcount']) ? $options['bk-show-bkcount'] : 1;
		$id 		= $this->group.'-options[bk-show-bkcount]';
		?>
		<input type="hidden" name="<?php echo $id; ?>" value="false">
		<input type="checkbox" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="1" <?php checked($option, 1); ?> />
		<label for="<?php echo $id; ?>">Show Product Count.</label>
		<?php
	}

}