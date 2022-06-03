<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'joint_settings';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
// Redux::disable_demo();   // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to execept HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Joint Options', 'joint-theme' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Joint Options', 'joint-theme' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => null,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transinets will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THEME BEFORE RELEASEING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.
	$args['intro_text'] = '<p>' . sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'your-textdomain-here' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';
}

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START SECTIONS
 */
// -> START Global Fields

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Joint options', 'joint-theme' ),
		'id'               => 'global',
		'desc'             => esc_html__( 'Global settings for joint theme that affect the entire site', 'joint-theme' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Logo', 'joint-theme' ),
		'id'         => 'global-logo',
		'desc'       => esc_html__( 'Media files for logo', 'joint-theme' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'           => 'logo-left',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Left logo', 'joint-theme' ),
				'compiler'     => 'true',
				'subtitle'     => esc_html__( 'Upload the image that will act as the left-hand side of the logo', 'joint-theme' ),
				'preview_size' => 'full',
			),
			array(
				'id'           => 'logo-right',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Right logo', 'joint-theme' ),
				'compiler'     => 'true',
				'subtitle'     => esc_html__( 'Upload the image that will act as the right-hand side of the logo', 'joint-theme' ),
				'preview_size' => 'full',
			),
		),
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Search settings', 'joint-theme' ),
		'desc'             => esc_html__( 'Settings for search form and page', 'joint-theme' ),
		'id'               => 'search-form',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'search-placeholder',
				'type'     => 'text',
				'title'    => esc_html__( 'Search placeholder', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the text that will serve as a placeholder for the search form (in other words, a hint)', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter placeholder',
			),
			array(
				'id'       => 'search_continue',
				'type'     => 'text',
				'title'    => esc_html__( '"Continue typing" text', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter text to be displayed when a person needs to enter more characters', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
			array(
				'id'       => 'search_no_results',
				'type'     => 'text',
				'title'    => esc_html__( '"No results" text', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the text to be displayed when no articles are found for the search query', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
			array(
				'id'       => 'search_page_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Search page headline', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the title to be displayed on the search page', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
		),
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Mail settings', 'joint-theme' ),
		'desc'             => esc_html__( 'Settings for sending an email', 'joint-theme' ),
		'id'               => 'main_sending',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'contacts_mail_to',
				'type'     => 'text',
				'title'    => esc_html__( 'Contacts "To mail"', 'joint-theme' ),
				'subtitle' => esc_html__( 'Mail to which contact form letters will be sent', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter email',
			),
			array(
				'id'       => 'contacts_mail_theme',
				'type'     => 'text',
				'title'    => esc_html__( 'Theme contacts mail', 'joint-theme' ),
				'subtitle' => esc_html__( 'Subject to which messages sent from the contact page will be subscribed', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter theme',
			),
			array(
				'id'       => 'send_mail_to',
				'type'     => 'text',
				'title'    => esc_html__( 'Send "To mail"', 'joint-theme' ),
				'subtitle' => esc_html__( 'Mail to which activity emails will be sent', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter email',
			),
			array(
				'id'       => 'send_mail_theme',
				'type'     => 'text',
				'title'    => esc_html__( 'Theme send mail', 'joint-theme' ),
				'subtitle' => esc_html__( 'Subject to which messages sent from the send page will be subscribed', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter theme',
			),
		),
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Common fileds', 'joint-theme' ),
		'id'               => 'cummon-fileds',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'activity_id',
				'type'     => 'text',
				'title'    => esc_html__( 'Activities page id', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the id of the activity page', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'menu_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Menu title', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter a menu title', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
			array(
				'id'       => 'no_posts',
				'type'     => 'text',
				'title'    => esc_html__( 'No content text', 'joint-theme' ),
				'subtitle' => esc_html__( 'Text when there are no necessary activities', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
			array(
				'id'       => 'copywriting',
				'type'     => 'text',
				'title'    => esc_html__( 'Copywriting', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the text to be displayed as copywriting', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
		),
	)
);

// -> START Categories options

Redux::set_section(
	$opt_name,
	array(
		'title'            	=> esc_html__( 'Categories options', 'joint-theme' ),
		'desc'             	=> esc_html__( 'Settings for categories', 'joint-theme' ),
		'id'               	=> 'cat-option',
		'customizer_width' 	=> '400px',
		'icon'					=> 'el el-list-alt'
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Categories form', 'joint-theme' ),
		'desc'             => esc_html__( 'Settings for categories form', 'joint-theme' ),
		'id'               => 'cat-form',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'lvl-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Level title', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter a heading for the level block', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
			array(
				'id'       => 'cat-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Categories title', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter a heading for the categories block', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
			array(
				'id'       => 'all-cat',
				'type'     => 'text',
				'title'    => esc_html__( 'All categories', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the text that will denote all categories', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter text',
			),
		),
	)
);

// -> START Card fileds

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Card options', 'joint-theme' ),
		'id'               => 'card-option',
		'desc'             => esc_html__( 'Setting up the display of activity cards on the website', 'joint-theme' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-photo',
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Levels block', 'joint-theme' ),
		'desc'             => esc_html__( 'Settings for cards level block', 'joint-theme' ),
		'id'               => 'lvl_block',
		'subsection'       => true,
		'customizer_width' => '400px',
		'fields'           => array(
			array(
				'id'       	=> 'lvl_group_title',
				'type'     	=> 'text',
				'title'    	=> esc_html__( 'Level group title', 'joint-theme' ),
				'subtitle' 	=> esc_html__( 'Enter a heading for the level block in which multiple levels are displayed', 'joint-theme' ),
				'desc' 		=> esc_html__( 'Must end in ":"', 'joint-theme' ),
				'default'  	=> '',
				'placeholder' => 'Enter text',
			),
		),
	)
);

// -> START Single page content

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Single activity', 'joint-theme' ),
		'id'               => 'single_activity',
		'desc'             => esc_html__( 'Settings for a single activity page', 'joint-theme' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-child',
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Single activity content', 'joint-theme' ),
		'id'               => 'single_content',
		'subsection'       => true,
		'customizer_width' => '400px',
		'fields'           => array(
			array(
				'id'           => 'single_top_image',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Top image', 'joint-theme' ),
				'compiler'     => 'true',
				'subtitle'     => esc_html__( 'Select the decorative image to be displayed at the top of the page', 'joint-theme' ),
				'preview_size' => 'full',
			),
			array(
				'id'           => 'single_middle_image',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Middle image', 'joint-theme' ),
				'compiler'     => 'true',
				'subtitle'     => esc_html__( 'Select the decorative image to be displayed in the middle of the page', 'joint-theme' ),
				'preview_size' => 'full',
			),
			array(
				'id'       => 'single_body_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Body headline', 'joint-theme' ),
				'subtitle' => esc_html__( 'The header with which the page content begins', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_list_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Materials list headline', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_video_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Video headline', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_steps_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Steps headline', 'joint-theme' ),
				'subtitle' => esc_html__( 'Heading with which the step-by-step instructions begin', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_article_link_value',
				'type'     => 'text',
				'title'    => esc_html__( 'Article link value', 'joint-theme' ),
				'subtitle' => esc_html__( 'Id of the page to which the article link leads', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_article_link_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Article link text', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_link_value',
				'type'     => 'text',
				'title'    => esc_html__( 'Middle block link value', 'joint-theme' ),
				'subtitle' => esc_html__( 'Id of the page to which the left-hand link leads', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_link_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Middle block link text', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_middle_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Middle block title', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_slider_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Slider title', 'joint-theme' ),
				'subtitle' => esc_html__( 'Header for section with slider', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_slider_count',
				'type'     => 'text',
				'title'    => esc_html__( 'Slider count', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the number of slides to be displayed', 'joint-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'single_slider_sort',
				'type'     => 'select',
				'title'    => esc_html__( 'Slider sort by', 'your-textdomain-here' ),
				'subtitle' => esc_html__( 'Select the criterion by which the slider items will be displayed', 'joint-theme' ),
				'options'  => array(
					'joint_popular' => 'Popular',
					'joint_new' => 'New',
				),
				'default'  => 'joint_popular',
			),
			array(
				'id'           => 'single_slider_image',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Slider image', 'joint-theme' ),
				'compiler'     => 'true',
				'subtitle'     => esc_html__( 'Select the decorative image to be displayed in the slider section', 'joint-theme' ),
				'preview_size' => 'full',
			),
		),
	)
);

// -> START 404 content

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( '404 page content', 'joint-theme' ),
		'id'               => '404_page',
		'desc'             => esc_html__( 'Content to be displayed on the 404 page', 'joint-theme' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-error',
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Content', 'joint-theme' ),
		'id'         => '404_content',
		'desc'       => esc_html__( 'Content 404 page', 'joint-theme' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'           => '404_image',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Image', 'joint-theme' ),
				'compiler'     => 'true',
				'subtitle'     => esc_html__( 'Select the image to be displayed on the 404 page', 'joint-theme' ),
				'preview_size' => 'full',
			),
			array(
				'id'       => '404_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter a heading for the 404 page', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter heading',
			),
			array(
				'id'       => '404_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Subtitle', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter a subtitle for the 404 page', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter subtitle',
			),
			array(
				'id'       => '404_link_value',
				'type'     => 'text',
				'title'    => esc_html__( 'Link value', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the pages to be linked to', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter link value',
			),
			array(
				'id'       => '404_link_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Link text', 'joint-theme' ),
				'subtitle' => esc_html__( 'Enter the text with which the links will be displayed', 'joint-theme' ),
				'default'  => '',
				'placeholder' => 'Enter links text',
			),
		),
	)
);

/*
 * <--- END SECTIONS
 */