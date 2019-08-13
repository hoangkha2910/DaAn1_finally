<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Nora
 * @since Nora 1.0
 */

get_sidebar( 'footer' ); ?>

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<div class="wrap clearfix">

	    <!-- Links -->
	    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		    <?php 
		    	if ( has_nav_menu( 'footer-menu' ) ) :
				    wp_nav_menu(
					    array(
						    'theme_location' => 'footer-menu',
						    'container'      => false,
						    'menu_id'        => 'links',
						    'menu_class'     => 'footer-menu',
						    'depth'          => '1'
					    )
				    );

	    		endif; 
	    	?>
		</nav>

	    <!-- Copyright -->
		<p class="copyright">

		<?php if ( get_theme_mod('copyright_seting' ) ) : ?>
			<?php echo esc_html( get_theme_mod( 'copyright_seting' ) ); ?><br>
		<?php else : 
			esc_html_e( 'Copyright &copy; All rights reserved. Nora WordPress Theme by', 'nora' ); ?>
					<a href="<?php echo esc_url('http://styledthemes.com/'); ?>" target="_blank"><?php esc_html_e( 'StyledThemes', 'nora' ); ?></a>
		<?php endif; ?>

		</p>


	</div>
</footer>

<?php get_sidebar( 'drawer' ); ?>

<?php wp_footer(); ?>

	</body>
</html>
