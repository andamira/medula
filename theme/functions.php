<?php
/**
 * This is the functions.php file. (#) means feature disabled by default
 *
 *     0 Readme First
 *
 *     1 Global Options
 *
 *         1.1 Toolset Layouts                  (#)
 *         1.2 IE8 Support                      ( )
 *         1.3 Optimization                     (#)
 *
 *     2 Theme Functionlity
 *
 *         2.1  Core Médula library
 *         2.2  Admin Área                      ( )
 *         2.3  Icons & Favicons
 *         2.4  Fonts
 *         2.5  Navigation Menus
 *         2.6  Sidebars
 *         2.7  Thumbnails
 *         2.8  Titles
 *         2.9  Entry Meta
 *         2.10 Comments
 *         2.11 Page Links
 *         2.12 No Post Found
 *         2.13 Admin Bar
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
 *     5 Plugin Functionality                   (#)
 *
 *     6 Custom Functions, Actions & Filters
 *
 *
 * Author: andamira
 * URL: htp://andamira.net/medula/
 *
 * @link http://codex.wordpress.org/Function_Reference/ Don't reinvent the wheel.
 */


/**
 * 0 README FIRST
 * ************************************************************
 *
 * PHP FILES:
 * @link https://make.wordpress.org/core/handbook/coding-standards/php/
 * @link http://www.phpdoc.org/docs/latest/index.html
 *
 *
 *
 */


/**
 * 1 GLOBAL OPTIONS
 * ************************************************************
 *
 */

/**
 * 1.1 TOOLSET LAYOUTS
 *
 *
 */

# define( 'TOOLSET_LAYOUTS', true );   // (#) disabled by default

/**
 * 1.2 OPTIMIZATION
 *
 *
 * @see medula_cleanup_all()
 */

// Remove the whitespace from HTML between wp_head and wp_footer.
# define( 'MEDULA_OPTIMIZE_HTML', true );   // (#) disabled by default

/**
 * 1.3 IE 8 SUPPORT
 *
 * Set to true to enable support for IE 8 by
 * conditionally loading the polyfill libraries
 * nwmatcher, respond & selectivizr, in header.php
 */
define( 'MEDULA_IE8_SUPPORT', true );      // ( ) enabled by default


/**
 * 2 THEME FUNCTIONALITY
 * ************************************************************
 *
 * @link https://github.com/andamira/medula/wiki/Theme_includes
 *
 * You can customize any of these files. You can also
 * comment the includes if you prefer to use your system
 * for favicons, fonts, sidebars, etc.
 *
 */

// Core Functions & Libraries
require_once( 'lib/medula.php' );

// Admin Area Customization
require_once( 'lib/admin.php' );           // ( ) enabled by default

require_once( 'lib/icons.php' );           // 
require_once( 'lib/fonts.php' );           // 
require_once( 'lib/navigation.php' );           // 
require_once( 'lib/theme-customize.php' ); // 
require_once( 'lib/sidebars.php' );        // 
require_once( 'lib/thumbnails.php' );      // 
require_once( 'lib/titles.php' );          // 
require_once( 'lib/entry-meta.php' );      // 
require_once( 'lib/comments.php' );        // 
require_once( 'lib/page-links.php' );      // 
require_once( 'lib/no-post-found.php' );   // 
require_once( 'lib/admin-bar.php' );       // 


/**
 * 3 AFTER SETUP THEME
 * ************************************************************
 *
 * Functions defined in /theme/lib/medula.php
 */
function medula_launch() {

	/**
	* 4.1 language support
	*/
	load_theme_textdomain( 'medula-theme', get_template_directory() . '/translations' );

	/**
	* 4.2 cleanup
	*/
	medula_cleanup_all();

	/**
	* 4.3 enqueue base scripts and styles
	*/
	add_action( 'wp_enqueue_scripts', 'medula_scripts_and_styles', 999 );

	/**
	* 4.4 custom theme features
	*/
	medula_theme_support();

	/**
	* 4.5 register sidebars ( sidebars are defined in /theme/lib/sidebars.php )
	*/
	add_action( 'widgets_init', 'medula_register_sidebars' );
}
add_action( 'after_setup_theme', 'medula_launch' );


/**
 * 4 EXTERNAL LIBRARIES & PLUGINS
 * ************************************************************
 *
 * This file controls the inclusion of third party
 * libraries, fixes & cleanups for external libraries
 * and plugins. And specific includes for some big
 * and important plugins like WPML & WooCommerce
 */
include_once( 'lib/vendor.php' );


/**
 * 5 PLUGIN FUNCTIONALITY FOR MEDULA
 * ************************************************************
 *
 * This is a very simple plugin template embedded in Médula
 *
 * This enables functionality that scapes the scope
 * of the theme: Custom post types, shortcodes, etc.
 *
 * You must customize the included file (and the files
 * it itself includes) to your particular needs.
 *
 * Remember:
 * You should make this a standalone plugin.
 * See the wiki for instructions:
 *
 * @link https://github.com/andamira/medula/wiki/Plugin
 */

# include_once( 'Plugin/Plugin.php' );


/**
 * 6 CUSTOM FUNCTIONS, ACTIONS & FILTERS
 * ************************************************************
 *
 * Here you could put your custom functions, but before doing
 * that it's better if you take a look at the indexed sections
 * above, specially the THEME FUNCTIONALITY one.
 *
 */


