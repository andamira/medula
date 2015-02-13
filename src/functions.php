<?php
/**
 * This is the functions.php file. (#) means feature disabled by default
 *
 *     0 Readme First
 *
 *     1 Global Options
 *
 *         1.1 Debug                            (#)
 *         1.2 IE8 Support                      ( )
 *         1.3 Optimization                     (#)
 *
 *     2 Theme Functionlity
 *
 *         2.1  Ósea library
 *         2.2  Admin Área                      ( )
 *         2.3  Icons & Favicons
 *         2.4  Fonts
 *         2.5  Menus
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
 *     5 Médula: Plugin Functionality           (#)
 *
 *     6 Custom Functions, Actions & Filters
 *
 *
 * Author: andamira
 * URL: htp://andamira.net/osea/
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
 * 1.1 DEBUG
 *
 * Set to true in order to display debug information.
 * The functions are defined in /src/lib/osea.php
 */
# define( 'OSEA_DEBUG', true );           // (#) disabled by default

/**
 * 1.2 IE 8 SUPPORT
 *
 * Set to true to enable support for IE 8 by
 * conditionally loading the polyfill libraries
 * nwmatcher, respond & selectivizr, in header.php
 */
define( 'OSEA_IE8_SUPPORT', true );      // ( ) enabled by default

/**
 * 1.3 OPTIMIZATION
 *
 *
 * @see osea_after_setup_theme
 */

// Remove the whitespace from HTML between wp_head and wp_footer.
# define( 'OSEA_OPTIMIZE_HTML', true );   // (#) disabled by default


/**
 * 2 THEME FUNCTIONALITY
 * ************************************************************
 *
 * @link https://github.com/andamira/osea/wiki/Theme_includes
 *
 * You can customize any of these files. You can also
 * comment the includes if you prefer to use your system
 * for favicons, fonts, sidebars, etc.
 *
 */

// Core Functions & Libraries
require_once( 'lib/osea.php' );

// Admin Area Customization
require_once( 'lib/admin.php' );           // ( ) enabled by default

require_once( 'lib/icons.php' );           // 
require_once( 'lib/fonts.php' );           // 
require_once( 'lib/menus.php' );           // 
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
 * Functions defined in /src/lib/osea.php
 */
function osea_launch() {

	/**
	* 4.1 language support
	*/
	load_theme_textdomain( 'osea-theme', get_template_directory() . '/translations' );

	/**
	* 4.2 cleanup
	*/
	add_action( 'init', 'osea_head_cleanup' );
	// remove WP version from RSS
	add_filter( 'the_generator', 'osea_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'osea_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'osea_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'osea_gallery_style' );
	// cleaning up random code around images
	add_filter( 'the_content', 'osea_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'osea_excerpt_more' );
	// filters html output
	if ( defined( 'OSEA_OPTIMIZE_HTML' ) && OSEA_OPTIMIZE_HTML ) {
		add_action('wp_head', 'osea_optimize_html_buffer_start');
		add_action('wp_footer', 'osea_optimize_html_buffer_end');
	}

	/**
	* 4.3 enqueue base scripts and styles
	*/
	add_action( 'wp_enqueue_scripts', 'osea_scripts_and_styles', 999 );

	/**
	* 4.4 custom theme features
	*/
	osea_theme_support();

	/**
	* 4.5 register sidebars ( sidebars are defined in /src/lib/sidebars.php )
	*/
	add_action( 'widgets_init', 'osea_register_sidebars' );
}
add_action( 'after_setup_theme', 'osea_launch' );


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
 * 5 PLUGIN FUNCTIONALITY (MÉDULA)
 * ************************************************************
 *
 * Médula is a starter plugin embedded in Ósea
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
 * @link https://github.com/andamira/osea/wiki/Medula
 */

# include_once( 'medula/medula.php' );


/**
 * 6 CUSTOM FUNCTIONS, ACTIONS & FILTERS
 * ************************************************************
 *
 * Here you could put your custom functions, but before doing
 * that it's better if you take a look at the indexed sections
 * above, specially the THEME FUNCTIONALITY one.
 *
 */


