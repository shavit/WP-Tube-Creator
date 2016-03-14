<?php
/**
 * voltata theme functions.
 *
 * @package voltata
 */

/**
 * Determinating sidebar position on single.php and index.php if blog posts is being displayed there
 */
function voltata_sidebar_position_class(){
	switch ( get_theme_mod( 'voltata_sidebar_position' ) ){
		case 'right':
		  $column_order = '9';
		  break;
		case 'left':
		  $column_order = '9 col-sm-push-3';
		  break;
		case 'none':
		  $column_order = '12';
		  break;
		default:
		  $column_order = '9';
	}
	
	echo $column_order;
}