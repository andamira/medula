<?php
/**
 * functions.php File
 *
 *     >------------------>
 *
 *     1 Globals
 *
 *         1.1 Theme Resources URI
 *
 *     2 Theme Functionality
 *
 *         2.1  Core medula library
 *
 *         2.2  Head Meta & Link Tags
 *         2.3  Fonts
 *         2.4  Navigation Menus
 *         2.5  Sidebars
 *         2.6  Thumbnails
 *         2.7  Titles
 *         2.8  Entry Meta
 *         2.9  Comments
 *         2.10 Page Links
 *         2.11 No Post Found
 *
 *         2.12 Admin Area
 *
 *     3 After Setup Theme Actions
 *
 *         3.1 Language Support
 *         3.2 Cleanup
 *         3.3 Load Base Scripts & Styles
 *         3.4 Custom Theme Features
 *         3.5 Register Sidebars
 *
 *     4 External Libraries
 *
 *     5 Custom Functions, Actions & Filters
 *
 *     <------------------<
 *
 * @link http://codex.wordpress.org/Function_Reference/ Don't reinvent the wheel
 */


/**
 * 1 GLOBALS
 * ************************************************************
 */

/**
 * 1.1 Returns the theme resources URI, with an optional $subpath parameter
 * NOTE: This must match the THEME_RESOURCES global in /gulpfile.js
 */

function medula_get_theme_resources_uri( $subpath = '' ){
	return get_template_directory_uri() . '/res/' . $subpath;
}

/**
 * 2 THEME FUNCTIONALITY
 * ************************************************************
 *
 * @link https://github.com/andamira/medula/wiki/Theme_includes
 */

/**
 * 2.1 Core Functions & Libraries
 *
 * Enqueue styles & scripts, theme support, cleanup...
 */

require_once( 'lib/main.php' );

/**
 * 2.2 General Functionality
 */

require_once( 'lib/head-tags.php' );       // Meta Tags, Favicons, etc.
require_once( 'lib/fonts.php' );           // Load External Fonts
require_once( 'lib/navigation.php' );      // Register Menus
require_once( 'lib/sidebars.php' );        // Register Sidebars
require_once( 'lib/thumbnails.php' );      // Thumbnails and Default Sizes
require_once( 'lib/titles.php' );          // Entry Title Function
require_once( 'lib/entry-meta.php' );      // Entry Meta Fields Functions
require_once( 'lib/comments.php' );        // Comments Functions
require_once( 'lib/page-links.php' );      // Page Links Function
require_once( 'lib/post-not-found.php' );  // Post Not Found Function

/**
 * 2.3 Admin Area
 *
 * Default Widgets, Admin Bar, Theme Customizer, etc.
 */

require_once( 'lib/admin/main.php' );


/**
 * 3 AFTER SETUP THEME
 * ************************************************************
 *
 * Functions defined in /theme/lib/medula.php
 */

add_action( 'after_setup_theme', 'medula_launch' );

function medula_launch() {

	/**
	* 3.1 language support
	*
	* @link https://developer.wordpress.org/themes/functionality/internationalization/
	*/

	load_theme_textdomain( 'medula', get_template_directory() . '/i18n' );

	/**
	* 3.2 cleanup
	 */

	medula_cleanup_all();

	/**
	* 3.3 enqueue base scripts and styles
	 */

	add_action( 'wp_enqueue_scripts', 'medula_scripts_and_styles', 999 );

	/**
	* 3.4 custom theme features
	 */

	medula_theme_support();

	/**
	* 3.5 register sidebars ( sidebars are defined in /theme/lib/sidebars.php )
	 */

	add_action( 'widgets_init', 'medula_register_sidebars' );
}


/**
 * 4 EXTERNAL LIBRARIES & PLUGINS
 * ************************************************************
 *
 * This file controls the inclusion of third party libraries,
 * including fixes & cleanups for external libraries and also
 * for some big plugins like like WPML, Toolset & WooCommerce.
 */

include_once( 'lib/vendor.php' );


/**
 * 5 CUSTOM FUNCTIONS, ACTIONS & FILTERS
 * ************************************************************
 *
 * Here you could put some quick & dirty custom functions, but
 * before doing that it would be better to take a look at the
 * indexed sections above, and see if there are better places.
 */


