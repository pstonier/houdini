<?php
/**
 * livewell functions and definitions
 *
 * @package livewell
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'livewell_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function livewell_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on livewell, use a find and replace
	 * to change 'livewell' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'livewell', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-left' => __( 'Main Left', 'livewell' ),
		'main-right' => __( 'Main Right', 'livewell' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
    
    add_action( 'init', 'cd_add_editor_styles' );
    /**
     * Apply theme's stylesheet to the visual editor.
     *
     * @uses add_editor_style() Links a stylesheet to visual editor
     * @uses get_stylesheet_uri() Returns URI of theme stylesheet
     */
    function cd_add_editor_styles() {

        add_editor_style( get_stylesheet_uri() );

    }
    
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'livewell_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // livewell_setup
add_action( 'after_setup_theme', 'livewell_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function livewell_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'livewell' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Colophon', 'livewell' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'livewell_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function livewell_scripts() {
	wp_enqueue_style( 'livewell-style', get_stylesheet_uri() );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'livewell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'livewell-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'livewell-lettering', get_template_directory_uri() . '/js/jquery.lettering.js', array(), '0.6.1', false );
	wp_enqueue_script( 'livewell-custom', get_template_directory_uri() . '/js/custom.js', array(), '0', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'livewell_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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


function themeslug_theme_customizer( $wp_customize ) {
    // Fun code will go here

	
	$wp_customize->add_section( 'themeslug_logo_section' , array(
		'title'       => __( 'Logo', 'themeslug' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	
	$wp_customize->add_setting( 'themeslug_logo' );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
		'label'    => __( 'Logo', 'themeslug' ),
		'section'  => 'themeslug_logo_section',
		'settings' => 'themeslug_logo',
	) ) );
}

add_action('customize_register', 'themeslug_theme_customizer');

add_action('admin_head', 'acf_custom_admin_styles');

function acf_custom_admin_styles() {
  echo '<style>
    .column-block {
      display: table-cell;
    }
</style>';
}



add_filter("mce_external_plugins", "tomjn_mce_external_plugins");
function tomjn_mce_external_plugins($plugin_array){
	$plugin_array['typekit']  =  get_template_directory_uri().'/js/typekit.tinymce.js';
    return $plugin_array;
}