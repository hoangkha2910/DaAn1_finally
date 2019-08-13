<?php
/**
 * The template for the footer widget areas on posts and pages
 *
 * @package Nora
 * @since Nora 1.0
 */
if ( is_active_sidebar( 'nora-sidebar-footer' ) ) : ?>
	
		<aside id="sidebar-footer" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

			<div class="clearfix">
				
				<?php dynamic_sidebar( 'nora-sidebar-footer' ); ?>

			</div>

		</aside>

<?php endif;
