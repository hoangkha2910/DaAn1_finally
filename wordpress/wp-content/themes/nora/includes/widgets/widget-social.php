<?php

/* ----------------------------------------------------------------

   Name: nora Social Links
   URI: http://styledthemes.com/
   Description: Displays links to your social profiles in the sidebar
   Author: StyledThemes
   Author URI: http://styledthemes.com
 
-----------------------------------------------------------------
*/


add_action( 'widgets_init', 'nora_social_widgets' );

function nora_social_widgets() {
	register_widget( 'Nora_social_widget' );
}


/* ----------------------------------------------------------------
   WIDGET CLASS
-----------------------------------------------------------------*/

class Nora_social_widget extends WP_Widget {


/* ----------------------------------------------------------------
   WIDGET SETUP
-----------------------------------------------------------------*/

public function __construct(){
	parent::__construct(
		'nora_social_widget', 
		__( 'ST: nora Social Links', 'nora' ),
		array(
			'classname' => 'nora_social_widget',
			'description' => __( 'Social Ions list', 'nora' )
		),
		array(
			'width' => 300,
			'height' => 350,
			'id_base' => 'nora_social_widget'
		)
	);
}

/* ----------------------------------------------------------------
   WIDGET OUTPUT
-----------------------------------------------------------------*/

public function widget( $args, $instance ) {
	extract( $args );

	/* Our variables from the widget settings */
	$title = apply_filters( 'widget_title', $instance['title'], 'nora_social_widget' );
	$facebook = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
	$twitter = isset( $instance['twitter'] ) ?  $instance['twitter'] : '';
	$google = isset( $instance['google'] ) ?  $instance['google'] : '';
	$pinterest = isset( $instance['pinterest'] ) ?  $instance['pinterest'] : '';
	$tumblr = isset( $instance['tumblr'] ) ?  $instance['tumblr'] : '';
	$instagram = isset( $instance['instagram'] ) ?  $instance['instagram'] : '';
	$vimeo = isset( $instance['vimeo'] ) ?  $instance['vimeo'] : '';
	$dribbble = isset( $instance['dribbble'] ) ?  $instance['dribbble'] : '';
	$youtube = isset( $instance['youtube'] ) ?  $instance['youtube'] : '';
	$flickr = isset( $instance['flickr'] ) ?  $instance['flickr'] : '';
	$linkedin = isset( $instance['linkedin'] ) ?  $instance['linkedin'] : '';
	$github = isset( $instance['github'] ) ?  $instance['github'] : '';
	$skype = isset( $instance['skype'] ) ?  $instance['skype'] : '';
	$email = isset( $instance['email'] ) ?  $instance['email'] : '';
	$feed = isset( $instance['feed'] ) ?  $instance['feed'] : '';

	/* Display widget */
	echo $before_widget;

	if ( $title ) { 
		echo $before_title . esc_html( $title ) . $after_title;
	}

	?>

	<ul class="social-links">
				
			<?php if ( $facebook ) { ?>
				<li><a href="<?php echo esc_url( $instance['facebook']); ?>" class="link-facebook" title="<?php esc_attr_e( 'Facebook', 'nora' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<?php } ?>
			
			<?php if ( $twitter ) { ?>
				<li><a href="<?php echo esc_url( $instance['twitter']); ?>" class="link-twitter" title="<?php esc_attr_e( 'Twitter', 'nora' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<?php } ?>
			
			<?php if ( $google ) { ?>
				<li><a href="<?php echo esc_url( $instance['google']); ?>" class="link-google" title="<?php esc_attr_e( 'Google+', 'nora' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<?php } ?>
			
			<?php if ( $pinterest ) { ?>
				<li><a href="<?php echo esc_url( $instance['pinterest']); ?>" class="link-pinterest" title="<?php esc_attr_e( 'Pinterest', 'nora' ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
			<?php } ?>
			
			<?php if ( $tumblr ) { ?>
				<li><a href="<?php echo esc_url( $instance['tumblr']); ?>" class="link-tumblr" title="<?php esc_attr_e( 'Tumblr', 'nora' ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
			<?php } ?>
			
			<?php if ( $instagram ) { ?>
				<li><a href="<?php echo esc_url( $instance['instagram']); ?>" class="link-instagram" title="<?php esc_attr_e( 'Instagram', 'nora' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<?php } ?>
			
			<?php if ( $vimeo ) { ?>
				<li><a href="<?php echo esc_url( $instance['vimeo']); ?>" class="link-vimeo" title="<?php esc_attr_e( 'Vimeo', 'nora' ); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
			<?php } ?>
			
			<?php if ( $dribbble ) { ?>
				<li><a href="<?php echo esc_url( $instance['dribbble']); ?>" class="link-dribbble" title="<?php esc_attr_e( 'Dribbble', 'nora' ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
			<?php } ?>
			
			<?php if ( $youtube ) { ?>
				<li><a href="<?php echo esc_url( $instance['youtube']); ?>" class="link-youtube" title="<?php esc_attr_e( 'Youtube', 'nora' ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
			<?php } ?>
			
			<?php if ( $flickr ) { ?>
				<li><a href="<?php echo esc_url( $instance['flickr']); ?>" class="link-flickr" title="<?php esc_attr_e( 'flickr', 'nora' ); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
			<?php } ?>
			
			<?php if ( $linkedin ) { ?>
				<li><a href="<?php echo esc_url( $instance['linkedin']); ?>" class="link-linkedin" title="<?php esc_attr_e( 'LinkedIn', 'nora' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			<?php } ?>

			<?php if ( $github ) { ?>
				<li><a href="<?php echo esc_url($instance['github']); ?>" class="link-github" title="<?php esc_attr_e( 'Github', 'nora' ); ?>" target="_blank"><i class="fa fa-github-alt"></i></a></li>
			<?php } ?>

			<?php if ( $skype ) { ?>
				<li><a href="skype:<?php echo esc_url( $instance['skype']); ?>?userinfo" class="link-skype" title="<?php esc_attr_e( 'Skype Profile Name', 'nora' ); ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
			<?php } ?>

			<?php if ( $email ) { ?>
				<li><a href="<?php echo esc_url( $instance['email']); ?>" class="link-email" title="<?php esc_attr_e( 'Email', 'nora' ); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
			<?php } ?>

			<?php if ( $feed ) { ?>
				<li><a href="<?php echo esc_url( $instance['feed']); ?>" class="link-feed" title="<?php esc_attr_e( 'Feed', 'nora' ); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
			<?php } ?>

	</ul>
	
	<?php echo $after_widget;
}


/* ----------------------------------------------------------------
   WIDGET UPDATE
-----------------------------------------------------------------*/

public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	/* Strip tags */
	$instance['title'] = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
	$instance['facebook'] = isset( $new_instance['facebook'] ) ?  esc_url_raw( $new_instance['facebook'] ) : '';
	$instance['twitter'] = isset( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
	$instance['google'] = isset( $new_instance['google'] ) ? esc_url_raw( $new_instance['google'] ) : '';
	$instance['pinterest'] = isset( $new_instance['pinterest'] ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
	$instance['tumblr'] = isset( $new_instance['tumblr'] ) ?  esc_url_raw( $new_instance['tumblr'] ) : '';
	$instance['instagram'] = isset( $new_instance['instagram'] ) ?  esc_url_raw( $new_instance['instagram'] ) : '';
	$instance['vimeo'] = isset( $new_instance['vimeo'] ) ?  esc_url_raw( $new_instance['vimeo'] ) : '';
	$instance['dribbble'] = isset( $new_instance['dribbble'] ) ?  esc_url_raw( $new_instance['dribbble'] ) : '';
	$instance['youtube'] = isset( $new_instance['youtube'] ) ?  esc_url_raw( $new_instance['youtube'] ) : '';
	$instance['flickr'] = isset( $new_instance['flickr'] ) ?  esc_url_raw( $new_instance['flickr'] ) : '';
	$instance['linkedin'] = isset( $new_instance['linkedin'] ) ?  esc_url_raw( $new_instance['linkedin'] ) : '';
	$instance['github'] = isset( $new_instance['github'] ) ?  esc_url_raw( $new_instance['github'] ) : '';
	$instance['skype'] = isset( $new_instance['skype'] ) ?  esc_url_raw( $new_instance['skype'] ) : '';
	$instance['email'] = isset( $new_instance['email'] ) ?  esc_url_raw( $new_instance['email'] ) : '';
	$instance['feed'] = isset( $new_instance['feed'] ) ?  esc_url_raw( $new_instance['feed'] ) : '';

	return $instance;
}


/* ----------------------------------------------------------------
   WIDGET SETTINGS
-----------------------------------------------------------------*/

function form( $instance ) {

	/* Add default settings */
	$defaults = array(
		'title' => '',
		'facebook' => '',
		'twitter' => '',
		'google' => '',
		'pinterest' => '',
		'tumblr' => '',
		'instagram' => '',
		'vimeo' => '',
		'dribbble' => '',
		'youtube' => '',
		'flickr' => '',
		'linkedin' => '',
		'github' => '',
		'skype' => '',
		'email' => '',
		'feed' => ''
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); 
	
	/* Output the form */
	?>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'nora' ) ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php _e( 'Facebook Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php _e( 'Twitter Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php _e( 'Google+ Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" value="<?php echo esc_attr( $instance['google'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php _e( 'Tumblr Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" value="<?php echo esc_attr( $instance['tumblr'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php _e( 'Vimeo Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php _e( 'Dribbble Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php _e( 'Flickr Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>"><?php _e( 'Github Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" value="<?php echo esc_attr( $instance['github'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>"><?php esc_html_e( 'Skype User ID: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skype' ) ); ?>" value="<?php echo esc_attr( $instance['skype'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'feed' ) ); ?>"><?php esc_html_e( 'RSS Feed Link: ', 'nora' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'feed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'feed' ) ); ?>" value="<?php echo esc_attr( $instance['feed'] ); ?>" />
	</p>
		
	<?php
	}
}
