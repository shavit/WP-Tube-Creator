<?php
/**
 * @package wp-tube-creator
 * @version 1.0
 * 
 */
/*
Plugin Name: Wp Tube Creator
Plugin URI:
Description: Mass import videos to your WordPress website.
Author: Shavit Tzuriel
Version: 1.0
Author URI:
*/

/**
 * 
 *  Setup the plugin.
 * 
 */
function wp_tube_creator_init() {
  
  // register video post type
  register_post_type( 'wp_tube_creator_video',
    array(
      'labels' => array(
        'name' => __( 'Tube Videos' ),
        'singular_name' => __( 'Tube Video' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  
  add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'wp_tube_creator_video',
	) );
}
add_action( 'init', 'wp_tube_creator_init' );



/**
 * 
 *  Create a dashboard page.
 * 
 */ 
function createTubeCreatorDashboard(){
    require 'templates/uploader.php';
}

/**
 *  
 * Setup the plugin dashboard.
 *  
 * Add a page in the admin dashboard.
 */
function wp_tube_creator_dashboard(){
    // add a page
    add_menu_page(
        'Wp Tube Creator', 
        'Tube Creator', 
        'manage_options', 
        'wp-tube-creator',
        'createTubeCreatorDashboard',
        '',
        24);
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_menu', 'wp_tube_creator_dashboard' );

