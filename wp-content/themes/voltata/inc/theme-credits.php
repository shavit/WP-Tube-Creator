<?php
/**
 * voltata theme options.
 *
 * @package voltata
 */
function voltata_theme_menu(){
  add_theme_page( __( 'Voltata', 'voltata' ),
                 __( 'Voltata', 'voltata' ),
                 'administrator',
                 'voltata_theme_options',
                 'voltata_theme',
								 'dashicons-layout',
								 1);
}
add_action('admin_menu', 'voltata_theme_menu');

function voltata_theme() {
	echo '<div class="wrap">';
	
		echo '<h1>' . __('Voltata', 'voltata') . '</h1>';
	
		echo '<p>' . __('For theme customization head over to the WordPress customizer <a href="customize.php">here</a>.', 'voltata') . '</p>';
	
	  echo '<h2>' . __('Voltata Theme Information', 'voltata') . '</h2>';
	
		echo '<p>' . __('This theme recommends the following plugins:</br>
		                 Need a contact form? Use <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> along with the styling plugin <a href="https://wordpress.org/plugins/bootstrap-for-contact-form-7/" target="_blank">Bootstrap for Contact Form 7</a><br>.
										 For columns use <a href="https://wordpress.org/plugins/bootstrap-3-shortcodes/" target="_blank">Bootstrap Shortcodes for WordPress</a><br>
										 For custom CSS use a plugin like <a href="https://wordpress.org/plugins/simple-custom-css/" target="_blank">Simple Custom CSS</a>', 'voltata') . '</p>';
	
    echo '<h2>' . __('Voltata Theme Credits', 'voltata') . '</h2>';

    echo '<p>' . __('This theme was built with the help of the technologies and code presented by:<ul>
		                 <li><a href="http://getbootstrap.com/" target="_blank">Bootstrap &middot; The world&apos;s most popular mobile-first and responsive front-end framework</a></li>
										 <li><a href="http://underscores.me/" target="_blank">Underscores | A Starter Theme for WordPress</a></li>
										 <li><a href="https://dribbble.com/shots/1233464-24-Free-Flat-Social-Icons" target="_blank">Mohammed Alyousfi - Social Icons</a></li>
										 <li><a href="http://necolas.github.io/normalize.css/" target="_blank">Normalize</a></li>
										 </ul>', 'voltata');

	echo '</div>';
}