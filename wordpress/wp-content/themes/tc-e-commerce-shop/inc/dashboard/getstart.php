<?php
//about theme info
add_action( 'admin_menu', 'tc_e_commerce_shop_gettingstarted' );
function tc_e_commerce_shop_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'tc-e-commerce-shop'), esc_html__('Get Started', 'tc-e-commerce-shop'), 'edit_theme_options', 'tc_e_commerce_shop_guide', 'tc_e_commerce_shop_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function tc_e_commerce_shop_admin_theme_style() {
   wp_enqueue_style( 'tc-e-commerce-shop-font', tc_e_commerce_shop_admin_font_url(), array() );
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'tc_e_commerce_shop_admin_theme_style');

// Theme Font URL
function tc_e_commerce_shop_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function tc_e_commerce_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'tc-e-commerce-shop' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button class="tablinks home" onclick="openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'tc-e-commerce-shop' ); ?></button>
		  	<button class="tablinks" onclick="openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'tc-e-commerce-shop' ); ?></button>
		  	<button class="tablinks" onclick="openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'tc-e-commerce-shop' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Ecommerce Theme', 'tc-e-commerce-shop' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'tc-e-commerce-shop' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'tc-e-commerce-shop'); ?></a>
				<a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_DEMO_DATA ); ?>" target="_blank"><?php esc_html_e('Demo Data', 'tc-e-commerce-shop'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( TC_E_COMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'tc-e-commerce-shop'); ?></a>
			</div>
			<div class="col-tc-6">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screen.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'TC ECommerce Shop WordPress Theme is the ultimate solution to create multipurpose online stores such as online book store, sports store, electronic items store, mobile & tablet store, apparel store, fashion store, cosmetics shop, handbags store, medical stores, jewelry store, etc. It also covers different businesses including travel, technology, construction, digitals, design, product showcase, furniture, restaurant, corporate companies, agencies, bloggers, etc. Its built on Bootstrap which makes it a perfect base to sell out eCommerce items. It is built up of awesome features such as banners, call to action buttons, sidebars, testimonial section, shortcodes, and a lot more. The theme is developed using optimized codes that help in providing faster page load time each time a visitor browses your site. This customizable responsive WooCommerce WordPress theme offers various personalization options to ease the task of website development. The integrated social media features make this multipurpose theme highly interactive on social sites.', 'tc-e-commerce-shop' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'TC Ecommerce Theme Information', 'tc-e-commerce-shop' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'tc-e-commerce-shop' ); ?></a></p>
				<p><a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'tc-e-commerce-shop' ); ?></a></p>
				<p><a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'tc-e-commerce-shop' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'TC Ecommerce Pro Theme', 'tc-e-commerce-shop' ); ?></h4>
				<P><?php esc_html_e( 'Premium eCommerce WordPress Themes are phenomenal in terms of practicality, uniqueness, flexibility, versatility, and usability. You can use these multipurpose WordPress eCommerce Themes to build a diverse range of business stores. The niche specific layout of the themes reduces much of your time and efforts in building an online store. These user-friendly themes provide easy account management, user-friendly payment options, pop-ups, view cart and add to cart functionality, and so on. Furthermore, the versatile design displays every item in a distinct and impressive way. Also, the theme is updated on a regular basis with a multitude of advanced features that keeps you nowhere behind the emerging market trends. The best eCommerce ready WordPress themes have inbuilt WordPress Customizer so that you get full control to manage the different theme areas by utilizing ample of customization options. You can change almost everything from colors, fonts, banners, background, featured images, texts, sidebars, links, etc. You will find different custom shortcodes that are well packed in the WordPress woo-commerce Themes to display multiple elements on posts and pages. The WordPress eCommerce templates are user-friendly due to the in-built features such as advanced filters, pop-ups, social sharing options, responsive elements, well-sorted product pages, and various other exclusive features.', 'tc-e-commerce-shop' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Product Description', 'tc-e-commerce-shop' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Simple and Mega Menu Option', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with multiple effects and control options', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Parallax Image-Background Section', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'tc-e-commerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'tc-e-commerce-shop' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'tc-e-commerce-shop' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'tc-e-commerce-shop' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'tc-e-commerce-shop' ); ?></P>
					<a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'tc-e-commerce-shop' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'tc-e-commerce-shop'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'tc-e-commerce-shop' ); ?></P>
					<a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'tc-e-commerce-shop'); ?></a>
				</div>
			</div>
			<div class="tab-cont">
				<h4><?php esc_html_e('About Child Theme', 'tc-e-commerce-shop'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'To customize theme files, you can do variations in child theme rather than in the main theme file.', 'tc-e-commerce-shop' ); ?></P>
					<a href="<?php echo esc_url( TC_E_COMMERCE_SHOP_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('Child Theme', 'tc-e-commerce-shop'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>