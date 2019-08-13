<?php /* Post Format: Video */ ?>

	<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<div title="<?php the_title_attribute(); ?>" class="entry-image">

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'nora-l' ); ?>
			<?php endif; ?>

		</div>

		<?php if ( is_single() ) : ?>

			<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

		<?php else : ?>

			<h2 class="entry-title" itemprop="headline">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

		<?php endif; ?>

		<p class="entry-meta">
			<?php esc_html_e( ' by ', 'nora' ); ?>
			<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" itemprop="url" rel="author"><?php esc_html( get_the_author() ); ?></a></span>
			<?php esc_html_e( ' on ', 'nora' ); ?>
			<time class="entry-time" itemprop="datePublished" datetime="<?php echo esc_html( get_the_time( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php esc_html_e( ' in ', 'nora' ); ?>
			<span class="entry-categories"><?php the_category( ', ' ); ?></span>
			<?php esc_html_e( ' with ', 'nora' ); ?>
			<span class="entry-comments-meta"><?php comments_popup_link( __( '0 Replies', 'nora' ), __( '1 Reply', 'nora' ), __( '% Replies', 'nora' ) ); ?></span>
		</p>
		
	</header>

	<div class="entry-content" itemprop="text">

		<?php if ( is_single() ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php the_excerpt(); ?>
			<a class="more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Continue Reading', 'nora' ); ?></a>
		<?php endif; ?>

	</div>

	<?php if ( is_single() ) : ?>

		<?php wp_link_pages( 'before=<div class="entry-links">&after=</div>' ); ?>
		
		<footer class="entry-footer">
			<p class="entry-meta">
				<span><?php esc_html_e( 'Posted in', 'nora' ); ?>: <?php the_category( ', ' ); ?></span>
				<?php if ( has_tag() ) : ?>
					<br>
					<span><?php esc_html_e( 'Tagged with', 'nora' ); ?>: <?php the_tags( '', ', ', '' ); ?></span>
				<?php endif; ?>
			</p>
		</footer>

	<?php endif; ?>
