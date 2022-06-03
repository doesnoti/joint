<?php
/**
 * Joint Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Joint_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'joint_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function joint_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Joint Theme, use a find and replace
		 * to change 'joint-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'joint-theme', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'joint-theme' ),
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
				'joint_theme_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'joint_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function joint_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'joint_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'joint_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function joint_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'joint-theme' ),
			'id'            => 'sidebar',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer widgets', 'joint-theme' ),
			'id'            => 'joint_footer_widgets',
			'description'   => esc_html__( 'Sidebar, which displays information in the footer columns', 'joint-theme' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'joint_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function joint_theme_scripts() {
	wp_enqueue_style( 'joint-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'joint-theme-main-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );
	wp_style_add_data( 'joint-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'joint-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'joint-theme-script', get_template_directory_uri() . '/assets/js/script.min.js', array(), _S_VERSION, true );
	wp_localize_script( 'joint-theme-script', 'jointAjax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );
}
add_action( 'wp_enqueue_scripts', 'joint_theme_scripts' );


/*
 * Changing the length of the trimmed text
*/
add_filter( 'excerpt_length', function(){
	return 20;
} );

/*
 * Redux configuration file
*/
require get_template_directory() . '/inc/redux-config.php';

/*
 * Remove Posts post type
*/
require_once get_template_directory() . "/inc/joint-remove-posts.php";

/*
 * Remove Comments post type
*/
require_once get_template_directory() . "/inc/joint-remove-comments.php";

/*
 * Add column widget
*/
require_once get_template_directory() . "/widgets/joint-widget-column.php";

/*
 * Add activities widget
*/
require_once get_template_directory() . "/widgets/joint-widget-activities.php";

/*
 * Initialise all custom widgets
*/
require_once get_template_directory() . "/widgets/joint-widgets-init.php";

/*
 * Add custom Level taxomony
*/
require_once get_template_directory() . "/inc/joint-add-level-taxonomy.php";

/*
 * Add custom Activity post type
*/
require_once get_template_directory() . "/inc/joint-add-activity-post-type.php";

/*
 * Add views counter for Activities
*/
require_once get_template_directory() . "/inc/joint-add-activity-views-counter.php";

/*
 * Add custom classes to nav-menu
*/
require_once get_template_directory() . "/inc/joint-custom-nav-classes.php";

/*
 * Automatically set the image Title, Alt-Text upon upload
*/
require_once get_template_directory() . "/inc/joint-autoset-image-attr.php";

/*
 * Add custom column post slug
*/
require_once get_template_directory() . "/inc/joint-add-slug-column.php";

/*
 * Display img function
*/
require_once get_template_directory() . "/inc/joint-display-image.php";

/*
 * Activity filter
*/
require_once get_template_directory() . "/inc/joint-activities-filter.php";

/*
 * Custom WC clean
*/
require_once get_template_directory() . "/inc/joint-wc-clean.php";

/*
 * Custom WC query string
*/
require_once get_template_directory() . "/inc/joint-wc-query-string.php";

/*
 * Search by activity only
*/
require_once get_template_directory() . "/inc/joint-search-only-activity.php";

/*
 * Search WP plugin settings
*/
require_once get_template_directory() . "/inc/joint-searchwp-setting.php";

/*
 * Category page by activity
*/
require_once get_template_directory() . "/inc/joint-activities-on-category-page.php";

/*
 * SMTP Setting to send the mail
*/
require_once get_template_directory() . "/inc/joint-smtp-setting.php";

/*
 * Send contacts-form
*/
require_once get_template_directory() . "/inc/joint-send-contacts-form.php";

/*
 * Send send-form
*/
require_once get_template_directory() . "/inc/joint-send-send-form.php";

/*
 * Converts multi-dimensional array to a flat array.
*/
require_once get_template_directory() . "/inc/joint-array-flatten.php";

/*
 * Converts a file name to one that is not executable as a script.
*/
require_once get_template_directory() . "/inc/joint-antiscript-file-name.php";

/*
 * Registering a metabox class
*/
// Metabox class
require_once get_template_directory() . "/inc/meta-box-class/class-joint-metaboxes.php";
// Metabox initializing function
require_once get_template_directory() . "/inc/metaboxes-init/joint-homepage-metaboxes.php";
require_once get_template_directory() . "/inc/metaboxes-init/joint-steps-metaboxes.php";
require_once get_template_directory() . "/inc/metaboxes-init/joint-offer-metaboxes.php";
require_once get_template_directory() . "/inc/metaboxes-init/joint-contacts-metaboxes.php";
require_once get_template_directory() . "/inc/metaboxes-init/joint-send-metaboxes.php";
require_once get_template_directory() . "/inc/metaboxes-init/joint-activity-page-metaboxes.php";
require_once get_template_directory() . "/inc/metaboxes-init/joint-single-metaboxes.php";