<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package TC E-Commerce Shop
 */

get_header(); ?>

<?php do_action( 'tc_e_commerce_shop_header_page' ); ?>

<div class="container">
    <div class="middle-align">       
        <div class="col-md-8" id="content-aa">
            <?php while ( have_posts() ) : the_post(); ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                <h1><?php the_title(); ?></h1>
                <?php the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'tc-e-commerce-shop' ),
                    'after'  => '</div>',
                ) );
                
                //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
             
        </div>
        <div class="col-md-4">
            <?php get_sidebar();?>
        </div>
        <div class="clearfix"></div>              
    </div>
</div>

<?php do_action( 'tc_e_commerce_shop_footer_page' ); ?>

<?php get_footer(); ?>