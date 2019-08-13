<?php
/**
 * control for customizer
 * @package nora
 */

// style
  // Setting for Link & Accent Color
  $wp_customize->add_setting( 'accent_color', array(
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  // Control for Button Color hover 
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
    'label'      => __( 'Link & Accent Color', 'nora' ),
    'section'    => 'style_section',
    'settings'   => 'accent_color',
  ) ) 
);


/*
 *
 * Homepage Setting
 *
*/

  // Intro Heading
  $wp_customize->add_setting( 
    'home_intro_heading', 
      array(
      'sanitize_callback' => 'nora_sanitize_text',  
      )
  );

  $wp_customize->add_control( 'home_intro_heading', array(
    'label'    => __( 'Intro Heading ', 'nora' ),
    'section'  => 'homepage_intro_section',
    'type'     => 'text',
    'settings' => 'home_intro_heading',
  ) );

  // Intro Sub Heading
  $wp_customize->add_setting( 
    'home_intro_sub_heading', 
      array(
      'sanitize_callback' => 'nora_sanitize_text',  
      )
  );

  $wp_customize->add_control( 'home_intro_sub_heading', array(
    'label'    => __( 'Intro Sub Heading ', 'nora' ),
    'section'  => 'homepage_intro_section',
    'type'     => 'textarea',
    'settings' => 'home_intro_sub_heading',
  ) );


  // Text Column section. This renders the content on homepage template, selecting post on the basis of post
  
	$wp_customize->add_setting( 'homepage_show_featured_post', array(
		'default' => 0,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'homepage_show_featured_post', array(
	    'section' =>      'nora_homepage_featured_post',
	    'label' =>      __('Show Featured Post', 'nora'),
	    'type' =>      'checkbox',
	    'priority' => 1,
	) );

  	$wp_customize->add_setting( 'homepage_featured_post', array(
        'sanitize_callback' => 'absint',
          )
  	);

	$wp_customize->add_control( new Nora_category_dropdown( $wp_customize, 'homepage_featured_post', array(
		'label' => esc_html__( 'Choose Featured Post From Category', 'nora' ),
		'section' => 'nora_homepage_featured_post',
		'description' => __(' Select Category to show posts in Featured Section','nora'),
		'type' => 'select',
		'priority' => 3,
     
   ) ) );

// woo commerce setting
  $wp_customize->add_setting( 
    'shop_page_layout', 
      array(
      'default' => 'Fullwidth',
      'sanitize_callback' => 'nora_sanitize_shop_layout',  
  ) );

  $wp_customize->add_control( 'shop_page_layout', array(
    'label'    => __( 'Choose Shop Page Template ', 'nora' ),
    'section'  => 'shop_page_section',
    'settings' => 'shop_page_layout',
    'type'    => 'radio',
      'choices' => array(
          'with_sidebar' => __( 'Shop Page With sidebar', 'nora' ),
          'Fullwidth' => __( 'Shop Page Without sidebar ', 'nora' ),
      ),
  ) );

// single product
 $wp_customize->add_setting(
    'shop_single_layout',
      array(
      'default' => 'with_sidebar',
      'sanitize_callback' => 'nora_sanitize_shop_layout',
  ) );

  $wp_customize->add_control( 'shop_single_layout', array(
    'label'    => __( 'Choose single Product Template ', 'nora' ),
    'section'  => 'shop_page_section',
    'settings' => 'shop_single_layout',
    'type'    => 'radio',
      'choices' => array(
          'with_sidebar' => __( 'Product Page With sidebar', 'nora' ),
          'Fullwidth' => __( 'Product Page Without sidebar ', 'nora' ),
      ),
  ) );

/*
 * Footer Setting
*/
  // copyright
  $wp_customize->add_setting( 
    'copyright_seting', 
      array(
      'sanitize_callback' => 'nora_sanitize_text',  
      )
  );

  $wp_customize->add_control( 'copyright_seting', array(
    'label'    => __( 'Copyright Text ', 'nora' ),
    'section'  => 'copyright_section',
    'type'     => 'textarea',
    'settings' => 'copyright_seting',
  ) );



// ticker setting
  

$wp_customize->add_setting( 'nora_ticker_checkbox', array(
    'default' =>  0,
    'sanitize_callback'     =>  'nora_sanitize_checkbox'
));

$wp_customize->add_control(new Nora_WP_Customize_Switch_Control( $wp_customize, 'nora_ticker_checkbox', array(
    'section'       =>      'nora_ticker',
    'label'         =>      __('Enable Disable Ticker', 'nora'),
    'type'          =>      'switch',
    'output'        =>      array('Enable', 'Disable'),
    'priority' => 1,
)));

$wp_customize->add_setting( 'nora_ticker_title', array(
    'default'       =>      __( 'Latest', 'nora' ),
    'sanitize_callback'     =>  'nora_sanitize_text'
));

$wp_customize->add_control( 'nora_ticker_title', array(
    'section'       =>      'nora_ticker',
    'label'         =>      __('Ticker Title', 'nora'),
    'type'          =>      'text',
    'priority' => 2,
));

$wp_customize->add_setting( 'nora_ticker_text',  array(
    'default'       =>      __( 'Place a ticker text', 'nora' ),
    'sanitize_callback'     =>  'nora_sanitize_text'
));

$wp_customize->add_control( new Nora_category_dropdown( $wp_customize, 'nora_ticker_text', array(
    'label' => esc_html__( 'Choose category to show related post on ticker area', 'nora' ),
    'section' => 'nora_ticker',
    'type' => 'select',
    'priority' => 3,
     
) ) );


// slider setting

$wp_customize->add_setting( 'show_slider', array(
    'default'       =>      '0',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( new Nora_WP_Customize_Switch_Control_YesNo( $wp_customize, 'show_slider', array(
  'section'       =>      'slider_basic',
  'label'         =>      __('Show Slider', 'nora'),
  'type'          =>      'switch_yesno',
  'output'        =>      array('Yes', 'No')
)));


$wp_customize->add_setting('slider_speed', array(
  'default'       =>      '1000',
  'sanitize_callback' => 'nora_sanitize_text'
));

$wp_customize->add_control( 'slider_speed', array(
  'section'       =>      'slider_basic',
  'label'         =>      __('Slider Speed', 'nora'),
  'type'          =>      'text',
));


$wp_customize->add_control( 'slider_pause', array(
  'section'       =>      'slider_basic',
  'label'         =>      __('Slider Pause', 'nora'),
  'type'          =>      'text',
));    
                      
$wp_customize->add_setting( 'show_caption', array(
  'default'       =>      '0',
  'sanitize_callback' => 'absint'
));

$wp_customize->add_control(new Nora_WP_Customize_Switch_Control_YesNo( $wp_customize, 'show_caption', array(
  'section'       =>      'slider_basic',
  'label'         =>      __('Show Caption', 'nora'),
  'type'          =>      'switch_yesno',
  'output'        =>      array('Yes', 'No')
)));

//select Page for posts
$arg = array('posts_per_page' => -1);
$pages = get_posts($arg);
$fg_pages = array();
$fg_pages[] = __('Select Slider Post','nora');
foreach ( $pages as $page ) {
   $fg_pages[$page->ID] = $page->post_title;     
}

$wp_customize->add_setting('slider_1_post', array(
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'slider_1_post', array(
    'settings' => 'slider_1_post',
    'label'   => __('Select Post For Slider One','nora'),
    'section'  => 'slider_1',
    'type'    => 'select',
    'choices' => $fg_pages,
));   

                            
$wp_customize->add_setting( 'slider1_button_link', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'esc_url_raw' ) );

$wp_customize->add_control( 'slider1_button_link',array(
  'section'       =>      'slider_1',
  'label'         =>      __('Slider 1 Button Link', 'nora'),
  'type'          =>      'url',
));

$wp_customize->add_setting( 'slider1_button_text', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'nora_sanitize_text'
));

$wp_customize->add_control( 'slider1_button_text',array(
  'section'       =>      'slider_1',
  'label'         =>      __('Slider 1 Button Text', 'nora'),
  'type'          =>      'text',
));
                      
$wp_customize->add_setting('slider_2_post', array(
    'default'        => '',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'slider_2_post', array(
    'settings' => 'slider_2_post',
    'label'   => __('Select Post For Slider Two','nora'),
    'section'  => 'slider_2',
    'type'    => 'select',
    'choices' => $fg_pages,
));
                            
$wp_customize->add_setting('slider2_button_link', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control( 'slider2_button_link',array(
  'section'       =>      'slider_2',
  'label'         =>      __('Slider 2 Button Link', 'nora'),
  'type'          =>      'url',
));

$wp_customize->add_setting('slider2_button_text', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'nora_sanitize_text'
));

$wp_customize->add_control( 'slider2_button_text',array(
  'section'       =>      'slider_2',
  'label'         =>      __('Slider 2 Button Text', 'nora'),
  'type'          =>      'text',
));
                                
$wp_customize->add_setting('slider_3_post', array(
    'default'        => 'default',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'slider_3_post', array(
    'settings' => 'slider_3_post',
    'label'   => __('Select Post For Slider Three','nora'),
    'section'  => 'slider_3',
    'type'    => 'select',
    'choices' => $fg_pages,
));

$wp_customize->add_setting('slider3_button_link', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control( 'slider3_button_link',array(
  'section'       =>      'slider_3',
  'label'         =>      __('Slider 3 Button Link', 'nora'),
  'type'          =>      'url',
));

$wp_customize->add_setting('slider3_button_text', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'nora_sanitize_text'
));

$wp_customize->add_control( 'slider3_button_text',array(
  'section'       =>      'slider_3',
  'label'         =>      __('Slider 3 Button Text', 'nora'),
  'type'          =>      'text',
));

                            
$wp_customize->add_setting('slider_4_post', array(
    'default'        => '',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'slider_4_post', array(
    'settings' => 'slider_4_post',
    'label'   => __('Select Post For Slider Four','nora'),
    'section'  => 'slider_4',
    'type'    => 'select',
    'choices' => $fg_pages,
));

$wp_customize->add_setting('slider4_button_link', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control( 'slider4_button_link',array(
  'section'       =>      'slider_4',
  'label'         =>      __('Slider 4 Button Link', 'nora'),
  'type'          =>      'url',
));

$wp_customize->add_setting( 'slider4_button_text', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'nora_sanitize_text'
));

$wp_customize->add_control( 'slider4_button_text',array(
  'section'       =>      'slider_4',
  'label'         =>      __('Slider 4 Button Text', 'nora'),
  'type'          =>      'text',
));

$wp_customize->add_setting('slider_5_post', array(
    'default'        => '',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'slider_5_post', array(
    'settings' => 'slider_5_post',
    'label'   => __('Select Post For Slider Five','nora'),
    'section'  => 'slider_5',
    'type'    => 'select',
    'choices' => $fg_pages,
));

$wp_customize->add_setting( 'slider5_button_link', array(
  'transport'     =>      'postMessage',
  'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control( 'slider5_button_link',array(
  'section'       =>      'slider_5',
  'label'         =>      __('Slider 5 Button Link', 'nora'),
  'type'          =>      'url',
));

$wp_customize->add_setting( 'slider5_button_text', array(

    'transport'     =>      'postMessage',
    'sanitize_callback' => 'nora_sanitize_text'
));

$wp_customize->add_control( 'slider5_button_text',array(
    'section'       =>      'slider_5',
    'label'         =>      __('Slider 5 Button Text', 'nora'),
    'type'          =>      'text',
));


/** ==============================================================
     SANITIZE CALLBACK FUNCTION
 ============================================================== */


add_filter( 'nora_sanitize_image', 'nora_sanitize_upload' );
add_filter( 'nora_sanitize_file', 'nora_sanitize_upload' );
function nora_sanitize_upload( $input ) {
        
        $output = '';
        $filetype = wp_check_filetype($input);
        if ( $filetype["ext"] ) {
                $output = $input;
        }
        return $output;
}

/**
 * adds sanitization callback function : checkbox
 * @package nora 
*/
function nora_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}


/**
 * adds sanitization callback function : text
 * @package nora 
*/
function nora_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}


/**
 * adds sanitization callback function : radio site layout
 * @package nora 
*/
function nora_sanitize_shop_layout( $input ) {
    $valid = array(
          'with_sidebar' => __( 'Shop Page With sidebar', 'nora' ),
          'without_sidebar' => __( 'Shop Page Without sidebar', 'nora' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


/**
 * adds sanitization callback function : radio menu style
 * @package nora 
*/
function nora_sanitize_menuStyle( $input ) {
    $valid = array(
            'default' => __( 'Menu Style 1', 'nora' ),
            'regularMenu' => __( 'Menu Style 2', 'nora' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the layout : radio
 * @package nora 
*/
function nora_sanitize_blogstyle( $input ) {
    $valid = array(
    'blogright' => __( 'Blog with Right Sidebar', 'nora' ),
    'blogleft' => __( 'Blog with Left Sidebar', 'nora' ),
    'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'nora' ),
    'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'nora' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the featured image : radio
 * @package nora 
*/
function nora_sanitize_featured_image( $input ) {
    $valid = array(
    'big' => __( 'Wide Featured Image', 'nora' ),
    'small' => __( 'Small Featured Image', 'nora' ),
    'none' => __( 'Disable Featured Image', 'nora' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the comment status : radio
 * @package nora 
*/
function nora_sanitize_comment_status( $input ) {
    $valid = array(
      'enable' => __( 'Enable Comment', 'nora' ),
      'disable' => __( 'Disable Comment', 'nora' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function nora_store_slider_transition_sanitize($input) {
  $valid_keys = array(
    'true' => __('Fade', 'nora'),
    'false' => __('Slide', 'nora'),
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}



