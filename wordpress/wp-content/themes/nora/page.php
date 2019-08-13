<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Nora
 * @since Nora 1.0
 */

get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $content_width = 980; ?>

			<div class="entry-image">
				<?php the_post_thumbnail( 'nora-l' ); ?>
			</div>

		<?php endif; ?>

		<main id="content" role="main" itemprop="mainContentOfPage">

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
					
					<?php  // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>

				</article>

			<?php endwhile; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>

	</div>
			
<?php get_footer(); ?>
