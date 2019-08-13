<?php
/**
 * The template for displaying search results pages
 *
 * @package Nora
 * @since Nora 1.0
 */

get_header();

get_template_part( 'header', 'meta' ); ?>

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

						<?php if(function_exists('wp_pagenavi')) :

							wp_pagenavi();

						else : 

							next_posts_link('<span>&larr;</span> '.__('Older Posts', 'nora').'');
							previous_posts_link(__('Newer Posts', 'nora').' <span>&rarr;</span>');

						endif; ?>

					</div>

				<?php endif; ?>

			<?php else : ?>

				<div class="nora-search-result-not-found clearfix" itemprop="text">
					<p><?php _e( 'Your search did not match any entries', 'nora' ); ?></p>
					<?php get_search_form(); ?>
				</div>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>
	
	</div>
			
<?php get_footer(); ?>
