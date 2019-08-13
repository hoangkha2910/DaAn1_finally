<?php /* Post Format: Link */ ?>

	<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<?php if ( ! is_single() ) : ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'nora-l' ); ?>
					</a>
				</div>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ) : ?>

				<div class="entry-image">
					<?php the_post_thumbnail( 'nora-l' ); ?>
				</div>

			<?php endif; ?>

			<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

			<p class="entry-meta">
				<?php esc_html_e( ' by ', 'nora' ); ?>
				<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="<?php echo esc_attr(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" itemprop="url" rel="author"><?php echo esc_url(get_the_author()); ?></a></span>
				<?php esc_html_e( ' on ', 'nora' ); ?>
				<time class="entry-time" itemprop="datePublished" datetime="<?php echo esc_html( get_the_time( 'c' ) ); ?>"><?php echo esc_attr(get_the_date()); ?></time>
				<?php esc_html_e( ' in ', 'nora' ); ?>
				<span class="entry-categories"><?php the_category( ', ' ); ?></span>
				<?php esc_html_e( ' with ', 'nora' ); ?>
				<span class="entry-comments-meta"><?php comments_popup_link( __( '0 Replies', 'nora' ), __( '1 Reply', 'nora' ), __( '% Replies', 'nora' ) ); ?></span>
			</p>

		<?php endif; ?>
		
	</header>

	<div class="entry-content" itemprop="text">

		<?php if ( is_single() ) : ?>
			<?php the_content(); ?>
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
