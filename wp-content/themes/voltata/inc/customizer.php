<?php
/**
 * voltata Theme Customizer.
 *
 * @package voltata
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function voltata_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	//  =============================
	//  = 1. Theme display options  =
	//  =============================
	$wp_customize->add_section('voltata_display_options', array(
			'title'       => __('Voltata Display Options', 'voltata'),
			'description' => __( 'Select which areas of content you wish to display.', 'voltata' ),
			'priority'    => 120,
	));
	
	//  =============================
	//  = 1.1 Image logo            =
	//  =============================
	$wp_customize->add_setting('voltata_logo_image', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'voltata_sanitize_image',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'voltata_logo_image', array(
			'label'    => __('Upload a logo image', 'voltata'),
			'section'  => 'voltata_display_options',
			'settings' => 'voltata_logo_image',
	)));
	
	//  =============================
	//  = 1.2 Display site title    =
	//  =============================
	$wp_customize->add_setting('voltata_display_title', array(
			'default'           => 'display',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_display_title', array(
			'label'      => __('Display site title', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_display_title',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Display', 'voltata'),
			    'hide'    => __('Hide', 'voltata'),
			),
	));
	
	//  =============================
	//  = 1.3 Sidebar position      =
	//  =============================
	$wp_customize->add_setting('voltata_sidebar_position', array(
			'default'           => 'right',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'voltata_sanitize_select',
	));
	
	$wp_customize->add_control( 'voltata_sidebar_position', array(
			'label'    => __('Select sidebar position on blog posts and frontpage, if blog posts is featured there', 'voltata'),
			'section'  => 'voltata_display_options',
			'settings' => 'voltata_sidebar_position',
			'type'     => 'select',
			'choices'  => array(
					'right' => __('Default - right side', 'voltata'),
					'left'  => __('Left side', 'voltata'),
					'none'  => __('No sidebar', 'voltata'),
			),
	));
	
	//  =============================
	//  = 1.4 Slide to top button   =
	//  =============================
	$wp_customize->add_setting('voltata_display_top', array(
			'default'           => 'display',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_display_top', array(
			'label'      => __('Back to top button', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_display_top',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Display', 'voltata'),
			    'hide'    => __('Hide', 'voltata'),
			),
	));
	
	/////////////////////////////////////////////////////////////////////////////////////
	
	//  =============================
	//  = 2. Theme social options   =
	//  =============================
	$wp_customize->add_section('voltata_social_options', array(
			'title'       => __('Voltata Social Options', 'voltata'),
			'description' => __( 'Provide the URL to the social networks you\'d like to display.<br/><br/>
	                  It\'s highly recommended that you copy and paste the whole link like this:
										<b>https://www.facebook.com/facebook?fref=ts</b>', 'voltata' ),
			'priority'    => 140,
	));
	
	//  =============================
	//  = 2.1 Facebook              =
	//  =============================
	$wp_customize->add_setting('voltata_facebook', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_facebook', array(
		  'label'       => __('Facebook', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_facebook',
	));
	
	//  =============================
	//  = 2.2 Twitter               =
	//  =============================
	$wp_customize->add_setting('voltata_twitter', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_twitter', array(
		  'label'       => __('Twitter', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_twitter',
	));
	
	//  =============================
	//  = 2.3 LinkedIn              =
	//  =============================
	$wp_customize->add_setting('voltata_linkedin', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_linkedin', array(
		  'label'       => __('LinkedIn', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_linkedin',
	));
	
	//  =============================
	//  = 2.4 Pinterest             =
	//  =============================
	$wp_customize->add_setting('voltata_pinterest', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_pinterest', array(
		  'label'       => __('Pinterest', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_pinterest',
	));
	
	//  =============================
	//  = 2.5 Google+               =
	//  =============================
	$wp_customize->add_setting('voltata_google_plus', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_google_plus', array(
		  'label'       => __('Google+', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_google_plus',
	));
	
	//  =============================
	//  = 2.6 Tumblr                =
	//  =============================
	$wp_customize->add_setting('voltata_tumblr', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_tumblr', array(
		  'label'       => __('Tumblr', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_tumblr',
	));
	
	//  =============================
	//  = 2.7 Instagram             =
	//  =============================
	$wp_customize->add_setting('voltata_instagram', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_instagram', array(
		  'label'       => __('Instagram', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_instagram',
	));
	
	//  =============================
	//  = 2.8 Flickr                =
	//  =============================
	$wp_customize->add_setting('voltata_flickr', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_flickr', array(
		  'label'       => __('Flickr', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_flickr',
	));
	
	//  =============================
	//  = 2.9 YouTube               =
	//  =============================
	$wp_customize->add_setting('voltata_youtube', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_youtube', array(
		  'label'       => __('YouTube', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_youtube',
	));
	
	//  =============================
	//  = 2.10 Dribbble             =
	//  =============================
	$wp_customize->add_setting('voltata_dribbble', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_dribbble', array(
		  'label'       => __('Dribbble', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_dribbble',
	));
	
	//  =============================
	//  = 2.11 Soundcloud           =
	//  =============================
	$wp_customize->add_setting('voltata_soundcloud', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_soundcloud', array(
		  'label'       => __('Soundcloud', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_soundcloud',
	));
	
	//  =============================
	//  = 2.12 Envato               =
	//  =============================
	$wp_customize->add_setting('voltata_envato', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_envato', array(
		  'label'       => __('Envato', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_envato',
	));
	
	//  =============================
	//  = 2.13 Behance              =
	//  =============================
	$wp_customize->add_setting('voltata_behance', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_behance', array(
		  'label'       => __('Behance', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_behance',
	));
	
	//  =============================
	//  = 2.14 Vimeo                =
	//  =============================
	$wp_customize->add_setting('voltata_vimeo', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_vimeo', array(
		  'label'       => __('Vimeo', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_vimeo',
	));
	
	//  =============================
	//  = 2.15 WordPress            =
	//  =============================
	$wp_customize->add_setting('voltata_wordpress', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_wordpress', array(
		  'label'       => __('WordPress', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_wordpress',
	));
	
	//  =============================
	//  = 2.16 DeviantArt           =
	//  =============================
	$wp_customize->add_setting('voltata_deviantart', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_deviantart', array(
		  'label'       => __('DeviantArt', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_deviantart',
	));
	
	//  =============================
	//  = 2.17 Evernote             =
	//  =============================
	$wp_customize->add_setting('voltata_evernote', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_evernote', array(
		  'label'       => __('Evernote', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_evernote',
	));
	
	//  =============================
	//  = 2.18 Blogger              =
	//  =============================
	$wp_customize->add_setting('voltata_blogger', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_blogger', array(
		  'label'       => __('Blogger', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_blogger',
	));
	
}
add_action( 'customize_register', 'voltata_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function voltata_customize_preview_js() {
	wp_enqueue_script( 'voltata-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'voltata_customize_preview_js' );


/*
 * Sanitize image
 */
function voltata_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Sanitize radios
 */
function voltata_sanitize_radio( $value ) {
	if ( ! in_array( $value, array( 'display', 'hide' ) ) )
        $value = 'display';
 
  return $value;
}

/**
 * Sanitize radios
 */
function voltata_sanitize_select( $value ) {
	if ( ! in_array( $value, array( 'right', 'left', 'none' ) ) )
        $value = 'right';
 
  return $value;
}