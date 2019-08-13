<?php

/* Template Name: Homepage */ 

get_header(); 

	/*display slick slider*/
	do_action( 'nora_slickslider' );

 	//escape text content with wp_kses function which will allow p tag and its attribute along with a tag with it attribute
 	$allowed_html  = array(
	    'p' => array(
	        'class' => array(),
	        'id' => array()
	    ),
	    'a' => array(
	        'class' => array(),
	        'id' => array(),
	        'href' => array()
	    ),

	);

	if( get_theme_mod( 'home_intro_heading' ) || get_theme_mod( 'home_intro_sub_heading' ) ) { ?>
		<section id="intro" class="wrap clearfix">
			<?php if ( get_theme_mod( 'home_intro_heading' ) ) : ?>
				<h1><?php echo wp_kses( get_theme_mod( 'home_intro_heading' ), $allowed_html ); ?></h1>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'home_intro_sub_heading' ) ) : ?>
				<h2><?php echo wp_kses( get_theme_mod( 'home_intro_sub_heading' ), $allowed_html ); ?></h2>
			<?php endif; ?>
		</section>
	<?php } ?>

	<!--Text Columns @version- 1.0.3-->
	<?php if( get_theme_mod( 'homepage_show_featured_post' ) == 1 ) : ?>
		<section id="columns">
			<div class="clearfix">
			
				<?php $nora_featured_post = get_theme_mod( 'homepage_featured_post' );
				$featured_post_loop = new WP_Query( array( 'cat' => $nora_featured_post, 'posts_per_page' => 3 ) );
				$count = 0;

				while ( $featured_post_loop->have_posts() ) : $featured_post_loop->the_post();
					global $post; 
					$count++;
					$column_last = '';
					if( $count % 3 == 0 ) { $column_last = 'last'; } ?>

					<div  <?php post_class( 'homepage-featured-post column'. ' '. esc_attr( $column_last ) ); ?> >
						<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( 'nora-homepage-featurd-post', array( 'class' => 'homepage-featured-post' ) ); ?>
								
						<?php } ?>
						<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						<?php the_excerpt(); ?>

						<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php esc_html_e('Learn More', 'nora' ); ?></a></p>
					</div>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif; ?>	


	<!--Blog Posts-->
	<section id="blog" class="wrap clearfix">

		<?php $post_count = wp_count_posts()->publish; ?>

		<div class="blog-post<?php if ( $post_count == 1 ) { esc_attr_e( "blog-post-single", 'nora' ); } ?>">
			<?php global $nora_more; $nora_more = 0; ?>
			<?php
				$blog_args = array(
					'posts_per_page' => 1,
					'post__not_in' => get_option( 'sticky_posts' ),
				);
				$blog_post = new WP_Query( $blog_args );
			?>
			<?php while ( $blog_post->have_posts() ) : $blog_post->the_post() ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p class="entry-meta">
					<?php echo esc_html( get_the_date() ); ?> <span>&mdash;</span> <a href="<?php the_permalink(); ?>#comments" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s comments', 'nora' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php comments_number( __( 'No Comments', 'nora' ), __( '1 Comment', 'nora' ), __( '% Comments', 'nora' ) ); ?></a>
				</p>
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" class="more"><?php esc_html_e( 'Continue Reading', 'nora' ); ?></a>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="blog-posts">
			<ul>
				<?php
					$blog_args = array(
						'posts_per_page' 	=> 3,
						'offset'			=> 1,
					);
					$blog_post = new WP_Query( $blog_args );
				?>
				<?php while ( $blog_post->have_posts() ) : $blog_post->the_post() ?>
					<li>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p class="entry-meta">
							<?php echo esc_html( get_the_date() ); ?> <span>&mdash;</span> <a href="<?php the_permalink(); ?>#comments" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s comments', 'nora' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php comments_number( __( 'No Comments', 'nora' ), __( '1 Comment', 'nora' ), __( '% Comments', 'nora' ) );?></a>
						</p>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>

	</section>

			
<?php get_footer();
