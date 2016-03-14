<?php
/**
 * voltata functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package voltata
 */

if ( ! function_exists( 'voltata_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function voltata_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on voltata, use a find and replace
	 * to change 'voltata' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'voltata', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'     => esc_html__( 'Primary Menu', 'voltata' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'voltata' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'voltata_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // voltata_setup
add_action( 'after_setup_theme', 'voltata_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function voltata_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'voltata_content_width', 640 );
}
add_action( 'after_setup_theme', 'voltata_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function voltata_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog and Page Widgets', 'voltata' ),
		'id'            => 'sidebar-1',
		'description'   => __('Widgets displayed on the blog, blog posts and pages.', 'voltata'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-6 col-md-12">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Search Page Widgets', 'voltata' ),
		'id'            => 'sidebar-2',
		'description'   => __('Widgets displayed after search results and on the 404 error page.', 'voltata'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-6">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'voltata' ),
		'id'            => 'sidebar-3',
		'description'   => __('Widgets displayed in footer. 3 widgets is recommened.', 'voltata'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'voltata_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function voltata_scripts() {
	/* Loading CSS in header */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, NULL, 'all' );
	
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', false, NULL, 'all' );
	
	wp_enqueue_style( 'voltata-style', get_stylesheet_uri(), false, NULL, 'all' );

	/* Loading Javascript in footer */
	wp_enqueue_script( 'voltata-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'voltata-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'animate-wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), NULL, true );
	
	wp_enqueue_script( 'navigation-one', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), NULL, true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NULL, true );
	
	wp_enqueue_script( 'voltata-javascript', get_template_directory_uri() . '/js/javascript.js', array('jquery'), NULL, true );
	
	/**
	 * HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
	 */
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array('jquery'), NULL, true );
	
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array('jquery'), NULL, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'voltata_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom styling for forms such as search forms, password protected pages & comment forms
 */
require get_template_directory() . '/inc/theme-form-styling.php';

/**
 * Custom styling for gallery
 */
require get_template_directory() . '/inc/gallery-styling.php';

/**
 * Theme functions
 */ 
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Theme credits
 */ 
require get_template_directory() . '/inc/theme-credits.php';