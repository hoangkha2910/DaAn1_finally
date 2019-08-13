<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Nora
 * @since Nora 1.0
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<!-- Meta -->
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
		<?php
			if ( is_singular() && pings_open() ) { ?>
				<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
			<?php }
			wp_head(); 
		?>
		    
	</head>


	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

    	<div class="wrap shop-menu clearfix">
    		<?php nora_ticker_header_customizer(); ?>
    		
    		<!-- shop menu -->
    		<?php if ( class_exists( 'WooCommerce' ) ) {
    			do_action( 'nora_header_shop_menu_item' );
    		} ?>
    	</div>
	
	    <header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		    <div class="wrap clearfix">
			    <!-- Logo -->
				<div class="logo" itemprop="headline">
				<?php if ( has_custom_logo() ) :
					nora_the_custom_logo();
				else : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" class="plain"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
				</div>

				<!-- Sidebar Toggle -->
				<?php if( is_active_sidebar( 'nora-sidebar-drawer' ) ) { ?>
					<div id="toggle" class="nora-slide-menu">
						<i class="fa fa-plus"></i>
					</div>
				<?php } ?>	
				
				<!-- Navigation -->
			    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					
					    <?php
						    wp_nav_menu(
							    array(
								    'theme_location' => 'header-menu',
								    'container'      => false,
								    'menu_id'        => 'nav',
								    'menu_class'     => 'header-menu',
								    'depth'          => '4',
							    )
						    );
					    ?>
					
					<?php else : ?>
					
					<ul id="nav">
						<?php wp_list_pages( 'title_li=&depth=1' ); ?>
					</ul>
					
					<?php endif; ?>
				</nav>				

			</div>
							
		</header>
