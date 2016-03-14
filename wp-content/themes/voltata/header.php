<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voltata
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
	<header id="masthead" class="site-header row" role="banner">
		<div class="site-branding col-md-12 wow animated fadeInDown">
			
      <?php
        if ( get_theme_mod( 'voltata_logo_image' ) ) :
          echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
            echo '<img class="logo-image img-responsive" src="' . esc_url( get_theme_mod( 'voltata_logo_image' ) ) . '">';
          echo '</a>';
        endif;
      ?>
			
      <?php if( get_theme_mod( 'voltata_display_title' ) != 'hide' ) : ?>
        <?php if ( is_front_page() && is_home() ) : ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
      <?php endif; ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation row" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'col-md-12' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<!-- Mobile nav -->
		<div id="mobile-site-navigation" class="main-navigation row" role="navigation">
			<div class="col-md-12">
				<button type="button" id="menu-button" class="btn btn-default" aria-label="<?php echo __('Left Align', 'voltata'); ?>">
					<?php echo __('Menu', 'voltata'); ?> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
				</button>
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'secondary-menu') ); ?>
			</div>
		</div><!-- #mobile-site-navigation -->
	</header><!-- #masthead -->
	
	<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="" class="img-header wow animated fadeIn" data-wow-delay="0.5s">
		</a>
	<?php endif; // End header image check. ?>
	
	<div id="content" class="site-content row wow animated fadeIn" data-wow-delay="1s">
