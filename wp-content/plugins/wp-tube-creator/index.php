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
 *  Create a dashboard page.
 * 
 */ 
function createTubeCreatorDashboard(){
    echo 'Hello';    
}

/**
 *  
 * Setup the plugin.
 *  
 * Add a page in the admin dashboard.
 */
function setup_wp_tube_creator(){
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
add_action( 'admin_menu', 'setup_wp_tube_creator' );
