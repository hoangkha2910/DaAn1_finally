<?php

/* ----------------------------------------------------------------

 TABLE OF CONTENTS
 
	 1. LOCALIZATION
	 2. CONTENT WIDTH
	 3. THEME SETUP
	4. INIT
	 5. REGISTER SIDEBAR
	 6. ENQUEUE SCRIPTS
	 7. EXCLUDE FROM SEARCH
	 8. COMMENTS
	 9. MORE LINK
	 10. IS BLOG
	11. POST FORMAT: GALLERY
	12. CONTACT FORM
	13. NEXT/PREV POST NAV
   
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
   1. LOCALIZATION
-----------------------------------------------------------------*/

function nora_localization() {
	load_theme_textdomain( 'nora', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'nora_localization' );


/* ----------------------------------------------------------------
   2. CONTENT WIDTH
-----------------------------------------------------------------*/
$GLOBALS['content_width'] = 1280;

function nora_content_width() {

	$content_width = $GLOBALS['content_width'];

	/**
	 * Filter Nora content width of the theme.
	 *
	 * @since Nora 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'nora_content_width', $content_width );
}
add_action( 'template_redirect', 'nora_content_width', 0 );

/* ----------------------------------------------------------------
   3. THEME SETUP
-----------------------------------------------------------------*/

if ( ! function_exists( 'nora_theme_setup' ) ) {
	function nora_theme_setup() {
        
    	/* Register WP3+ menus */
 		register_nav_menu( 'header-menu', __( 'Header Menu', 'nora' ) );
        register_nav_menu( 'footer-menu', __( 'Footer Menu', 'nora' ) );
   	
    	/* Configure WP 2.9+ thumbnails */
    	add_theme_support( 'post-thumbnails' );
    	
        add_image_size( 'nora-s', 500, 500, true );
        add_image_size( 'nora-l', 980, '', true );
        add_image_size( 'nora-homepage-featurd-post', 64, 64, true );
        add_image_size('nora-prod-cat-size', 562, 492, true);
        
        add_theme_support( 
            'post-formats', 
            array(
                'gallery',
                'link',
                'quote',
                'video',
                'audio'
            ) 
        );     

		add_post_type_support( 'page', 'excerpt' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );

        /*
		 * Enable support for custom logo.
		 *
		 *  @since Nora 1.0
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
        //make woocommerce support
        add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

     
    }
}

add_action( 'after_setup_theme', 'nora_theme_setup' );



/* ----------------------------------------------------------------
  4. INIT
-----------------------------------------------------------------*/



/* Includes */
require_once get_template_directory() . '/includes/init.php';

require get_template_directory() . '/includes/nora-function.php';

/**
 * Load Class Custom Switch
 */
require get_template_directory() . '/includes/class/class-custom-switch.php';

/**
 * customizer options.
*/
require get_template_directory() . '/includes/customizer.php';


/* ----------------------------------------------------------------
   5. REGISTER SIDEBAR
-----------------------------------------------------------------*/

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar(array(
		'name' => __( 'Blog Sidebar', 'nora' ),
		'id' => 'nora-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Sidebar', 'nora' ),
		'id' => 'nora-sidebar-page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Footer Sidebar', 'nora' ),
		'id' => 'nora-sidebar-footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Drawer Sidebar', 'nora' ),
		'id' => 'nora-sidebar-drawer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	// check if woocommerce is active or not
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(array(
			'name' => __( 'Shop Page Sidebar', 'nora' ),
			'id' => 'nora-sidebar-shop-archive',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
	}
}
if ( ! function_exists( 'nora_fonts_url' ) ) :
/**
 * Register Google fonts for Nora.
 *
 * Create your own nora_fonts_url() function to override in a child theme.
 *
 * @since Nora 1.0.6
 *
 * @return string Google fonts URL for the theme.
 */
function nora_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans: on or off', 'nora' ) ) {
		$fonts[] = 'Open Sans:400italic,400,600,700,800';
	}


	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/* ----------------------------------------------------------------
   6. ENQUEUE SCRIPTS
-----------------------------------------------------------------*/

if ( !function_exists( 'nora_enqueue_scripts' ) ) {
	function nora_enqueue_scripts() {
		// get theme version
		$my_theme = wp_get_theme()->get('Version');
		//add open sans fonts
		wp_enqueue_style( 'nora-googlefont-opensans', nora_fonts_url(), array(), null );
	    // enqueue script
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), '1.5.0', true );

		wp_enqueue_script( 'jquery-ticker', get_template_directory_uri() . '/js/jquery.ticker.js', array('jquery'), '1.0.0', true );

		
		/* Register */
		wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', '1.0.1', TRUE );
		
		wp_register_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.2.2' );
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1.0' );
		wp_register_script( 'jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), '1.0.1' );
		wp_register_script( 'nora-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', TRUE );

		wp_enqueue_script( 'classie' );
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'jquery-flexslider' );
		wp_enqueue_script( 'jquery-fitvids' );
		wp_enqueue_script( 'jquery-slicknav' );
		wp_enqueue_script( 'nora-custom' );

		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_style( 'nora-main-style', get_stylesheet_uri(), FALSE, $my_theme );

		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', FALSE, '4.4.0' );
		wp_enqueue_style( 'nora-responsive', get_template_directory_uri() . '/css/responsive.css', FALSE, $my_theme );
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css');
		
		wp_enqueue_style( 'ticker', get_template_directory_uri() . '/css/ticker-style.css');

    }
}

add_action( 'wp_enqueue_scripts', 'nora_enqueue_scripts' );


/* ----------------------------------------------------------------
   8. COMMENTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'nora_comment' ) ) {

	function nora_comment( $comment, $args, $depth ) { ?>
        
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	        <article class="clearfix" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
				<?php echo get_avatar( $comment, 90 ); ?>
		        <div class="comment-author">
					<p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
						<cite class="fn" itemprop="name"><?php comment_author_link(); ?></cite>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
							<time itemprop="commentTime" datetime="<?php esc_attr( comment_time( 'c' ) ); ?>">
								<?php echo date_i18n( get_option( 'date_format' ) ); ?>
							</time>
						</a>
			            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			            <?php edit_comment_link( __( 'Edit', 'nora'), ' &middot; ', '' ) ?>
					</p>
		        </div>
				<div class="comment-content" itemprop="commentText">
		            <?php comment_text() ?>
		            <?php if ( $comment->comment_approved == '0' ) : ?>
		                <p><em class="awaiting"><?php esc_htm_e( 'Your comment is awaiting moderation.', 'nora' ) ?></em></p>
		            <?php endif; ?>
				</div>
	        </article>
		</li>

<?php }
}

/* ----------------------------------------------------------------
   9. using dynamic css and js
-----------------------------------------------------------------*/


function nora_use_dynamic_data_from_customizer() {

	$nora_dynamic_accent = '';
	include get_template_directory().'/css/style.css.php';

	wp_add_inline_style( 'nora-main-style', $nora_dynamic_accent );

	wp_register_script( 'nora-dynamic-script', get_template_directory_uri() . '/js/dynamic-js.js', array( 'jquery' ), '1.0', true  );

	// Localize the script with new data
	$ticker_title = get_theme_mod('nora_ticker_title', 'Ticker Title' );
	$nora_show_slider = get_theme_mod('show_slider', 0 );
	$nora_slider_speed = ( ! get_theme_mod('slider_speed')) ? "5000" : get_theme_mod('slider_speed');

	$dynamic_data = array(
		'nora_ticker_title'	=> esc_html( $ticker_title ),
		'nora_show_slider' => esc_html( $nora_show_slider ),
		'nora_slider_speed' => esc_html( $nora_slider_speed ),
	);
	wp_localize_script( 'nora-dynamic-script', 'nora_dynamic_script', $dynamic_data );

	// Enqueued script with localized data.
	wp_enqueue_script( 'nora-dynamic-script' );
}
add_action( 'wp_enqueue_scripts', 'nora_use_dynamic_data_from_customizer' );



/* ----------------------------------------------------------------
   9. MORE LINK
-----------------------------------------------------------------*/

function nora_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, __( 'Continue Reading', 'nora' ), $more_link );
}

add_filter( 'the_content_more_link', 'nora_more_link', 10, 2 );


/* ----------------------------------------------------------------
   10. IS BLOG
-----------------------------------------------------------------*/

function nora_is_blog () {
	global $post;
	$posttype = get_post_type( $post );
	return ( ( (is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) && ( $posttype == 'post' )  ) ? true : false;
}


/* ----------------------------------------------------------------
   13. NEXT/PREV POST NAV
-----------------------------------------------------------------*/

if ( ! function_exists( 'nora_article_nav' ) ) :

	function nora_article_nav() {

		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		
		<nav id="article-nav" class="clearfix" role="navigation">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr; &nbsp;Previous Post</span> %title', 'Previous post link', 'nora' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '<span class="meta-nav">Next Post&nbsp; &rarr;</span> %title', 'Next post link', 'nora' ) );
			?>
		</nav>
		
		<?php
	}

endif;


//add to cart fragments
function nora_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start(); ?>

    <a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View Cart', 'nora' ); ?>"><i class="fa fa-shopping-cart"></i> <?php echo sprintf( _n( '<span class="mini-cart-item-total">( %d )</span>', '<span class="mini-cart-item-total">( %d )</span>', absint( WC()->cart->get_cart_contents_count() ), 'nora' ), absint( WC()->cart->get_cart_contents_count() ) ); ?></a>

    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
add_filter('add_to_cart_fragments', 'nora_woocommerce_header_add_to_cart_fragment' );

/*
* make four column for woocommerce product
* @since version 1.0.2
*/
add_filter( 'loop_shop_columns', 'nora_custom_loop_columns' );
if ( ! function_exists( 'nora_custom_loop_columns' ) ) {

	function nora_custom_loop_columns() {
		return 4; //Display 3 products per row
	}
}