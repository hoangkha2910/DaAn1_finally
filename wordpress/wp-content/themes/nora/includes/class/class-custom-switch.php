<?php
/**
	* This function is 
*/
function nora_load_custom_wp_admin_style() {
    wp_enqueue_script( 'nora-admin-js', get_template_directory_uri() . '/js/st-admin.js', array( 'jquery' ), '20130508', true );
}
add_action( 'customize_controls_print_scripts', 'nora_load_custom_wp_admin_style' );


if(class_exists( 'WP_Customize_control')):
class Nora_WP_Customize_Switch_Control extends WP_Customize_Control {
		public $type = 'switch';
        
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <div class="switch_options">
                  <span class="switch_enable"> <?php _e('Enable', 'nora'); ?> </span>
                  <span class="switch_disable"> <?php _e('Disable', 'nora'); ?> </span>  
                  <input type="hidden" id="enable_prev_next" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" />							
                  <!--<label for="enable_prev_next"><?php _e('Check to Enable', 'nora'); ?></label>-->
                </div>
            </label>
		<?php
       
		}
	}
 class Nora_WP_Customize_Switch_Control_YesNo extends WP_Customize_Control {
		public $type = 'switch_yesno';
        
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <div class="switch_options">
                  <span class="switch_enable"> <?php _e('Yes', 'nora'); ?> </span>
                  <span class="switch_disable"> <?php _e('No', 'nora'); ?> </span>  
                  <input type="hidden" id="enable_prev_next_yn" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
                </div>
            </label>
		<?php
       
		}
	}
endif;