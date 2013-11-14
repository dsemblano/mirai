<?php
/**
 * miraitotalle functions and definitions
 *
 * @package miraitotalle
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'miraitotalle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function miraitotalle_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on miraitotalle, use a find and replace
	 * to change 'miraitotalle' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'miraitotalle', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'gallery_up', 350, 260, true );
	add_image_size( 'gallery_down', 300, 235, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'miraitotalle' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'miraitotalle_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // miraitotalle_setup
add_action( 'after_setup_theme', 'miraitotalle_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function miraitotalle_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'miraitotalle' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'miraitotalle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function miraitotalle_scripts() {
	wp_enqueue_style( 'miraitotalle-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'miraitotalle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'miraitotalle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	if(is_home()) {
		wp_enqueue_script( 'slideshow-init', get_template_directory_uri() . '/js/slideshow-init.js', array(), '20120207', true );
		wp_enqueue_script( 'slideshow', get_template_directory_uri() . '/js/jquery.hoverdir.js', array(), '20120207', true );
		wp_enqueue_script( 'slideshow_modernizr', get_template_directory_uri() . '/js/modernizr.custom.97074.js', array(), '20120207', true );
	}
	
	wp_enqueue_style('font-awesome', get_bloginfo('stylesheet_directory').'/fonts/font-awesome/css/font-awesome.min.css');

	
}
add_action( 'wp_enqueue_scripts', 'miraitotalle_scripts' );

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

/* SVG upload */
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/* Tirar a tag p das imagens do the_content */
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');
