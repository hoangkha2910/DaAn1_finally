<?php
/**
 * The template for drwaer sidebar, which will open when clicking on header toggle menu
 *
 * @package Nora
 * @since Nora 1.0
 */
?>

<aside id="sidebar-drawer" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="wrap clearfix">
		<?php dynamic_sidebar( 'nora-sidebar-drawer' ); ?>
	</div>
</aside>