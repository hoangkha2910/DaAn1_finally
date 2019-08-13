<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Nora
 * @since Nora 1.0
 */
?>
<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( nora_is_blog() ) : ?>

		<?php dynamic_sidebar( 'nora-sidebar' ); ?>
		
	<?php else : ?>

		<?php dynamic_sidebar( 'nora-sidebar-page' ); ?>

	<?php endif; ?>

</aside>
