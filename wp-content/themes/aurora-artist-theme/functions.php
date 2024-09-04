<?php
/**
 * aurora-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aurora-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aurora_wordpress_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on aurora-theme, use a find and replace
		* to change 'aurora-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'aurora-theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'aurora-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'aurora_wordpress_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);


		
}
add_action( 'after_setup_theme', 'aurora_wordpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aurora_wordpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aurora_wordpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'aurora_wordpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aurora_wordpress_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aurora-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aurora-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'aurora_wordpress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 wp_enqueue_script('underscore');
 
function aurora_wordpress_scripts() {
	wp_enqueue_style( 'aurora-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'aurora-theme-style', 'rtl', 'replace' );

	

	//wp_enqueue_script( 'aurora-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap/gsap.min.js', array(), null, true);
	 // Enqueue ScrollToPlugin
	 wp_enqueue_script('gsap-scrollto', get_template_directory_uri() . '/assets/js/gsap/ScrollToPlugin.min.js', array('gsap'), null, true);
	 wp_enqueue_script('gsap-scrolltrigger', get_template_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js', array('gsap'), null, true);



	wp_enqueue_script('bundle-js', get_template_directory_uri() . '/assets/js/main.js', array('gsap', 'gsap-scrollto', 'gsap-scrolltrigger'), null, true);
	wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css');
	wp_enqueue_style('bundle-css', get_template_directory_uri() . '/assets/css/main.css');
//	wp_enqueue_script('model-viewer', 'https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js', array(), null, true);
	

}
add_action( 'wp_enqueue_scripts', 'aurora_wordpress_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

function add_subscribe_form_to_menu($items, $args) {
    // Check if this is the correct menu location
    if ($args->theme_location == 'menu-1') {
        // Append the shortcode output to the menu items
        $items .= '<li class="menu-item">'. do_shortcode('[ae-custom-form id=1 no_profile_link=true no_salutation=true]<span class="text-white">SUBSCRIBE</span>[/ae-custom-form]') .'</li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_subscribe_form_to_menu', 10, 2);



/**
 * Font Awesome Kit Setup
 * 
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (! function_exists('fa_custom_setup_kit') ) {
	function fa_custom_setup_kit($kit_url = '') {
	  foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
		add_action(
		  $action,
		  function () use ( $kit_url ) {
			wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
		  }
		);
	  }
	}
  }

  fa_custom_setup_kit('https://kit.fontawesome.com/72acfa3098.js');

  // Enqueue Google Maps API
function my_acf_google_map_api($api){
	
    $api['key'] = 'AIzaSyA3ZqxvZwXqshbdC7fjkOtTsJBOr5-QlY4'; // Replace with your actual Google Maps API Key
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


  