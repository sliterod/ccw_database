<?php
/**
 * Dan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dan
 */

if ( ! function_exists( 'dan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dan_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dan, use a find and replace
	 * to change 'dan' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dan', get_template_directory() . '/languages' );

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

	add_image_size( 'dan-featured-image', 1920, 1080, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dan' ),
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

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Enable support editor-style on WordPress dashboard.
	add_editor_style( 'assets/css/editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'dan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dan_content_width', 812 );
}
add_action( 'after_setup_theme', 'dan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dan' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dan' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'dan' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'dan' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'dan' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'dan' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dan_scripts() {
	$my_theme = wp_get_theme();
	$version = $my_theme->get( 'Version' );

	// Add Font Awesome, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'dan-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dan-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), $version, true );

	wp_enqueue_script( 'object-fit-images', get_template_directory_uri() . '/assets/ofi/ofi.min.js', array( 'jquery' ), $version, true );

	wp_enqueue_script( 'dan-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'dan-navigation', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'dan' ),
		'collapse' => __( 'collapse child menu', 'dan' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'dan_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function dan_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'dan_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function dan_widget_tag_cloud_args( $args ) {
	$args['largest']  = 14;
	$args['smallest'] = 14;
	$args['unit']     = 'px';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'dan_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
