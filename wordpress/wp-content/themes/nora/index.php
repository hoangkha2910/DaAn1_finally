<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nora
 * @since 1.0.0
 */

get_header();

get_template_part( 'header-meta' ); ?>

	<div class="wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<?php 
						$format = get_post_format(); 
						get_template_part( 'content', $format );
					?>

				</article>

			<?php endwhile; ?>

				<?php if ( $wp_query->max_num_pages > 1 ) : ?>

					<!--Pagination-->
					<div class="pagination">

						<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

							<?php wp_pagenavi(); ?>

						<?php else : ?>

							<?php next_posts_link( '<span>&larr;</span> '.__( 'Older Posts', 'nora' ).'' ); ?>
							<?php previous_posts_link( __( 'Newer Posts', 'nora' ).' <span>&rarr;</span>' ); ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>
	
	</div>
			
<?php get_footer(); ?>
