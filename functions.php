<?php
/**
 * This is the functions.php file
 *
 * INDEX:
 * 		1 Global Options
 * 			1.1 Debug
 * 			1.2 Optimization
 *		2 Theme Functionlity
 *			2.1  Ósea library
 *			2.2  Admin
 *			2.3  Icons & Favicons
 *			2.4  Fonts
 *			2.5  Menus
 *			2.6  Sidebars
 *			2.7  Thumbnails
 *			2.8  Titles
 *			2.9  Entry Meta
 *			2.10 Comments
 *			2.11 Page Links
 *			2.12 No Post Found
 *			2.13 Admin Bar
 *		3 Plugin Functionality
 *		4 After Setup Theme Actions
 *			4.1 Language Support
 *			4.2 Cleanup
 *			4.3 Load Base Scripts & Styles
 *			4.4 Custom Theme Features
 *			4.5 Register Sidebars
 *		5 External Libraries
 * 		6 Custom Functions, Actions & Filters
 *
 * Author: andamira
 * URL: htp://andamira.net/osea/
 *
 * Don't reinvent the wheel. Take a look to:
 * @see:codex http://codex.wordpress.org/Function_Reference/
 */


/**
 * 1 GLOBAL OPTIONS
 * ************************************************************
 *
 */

/**
 * 1.1 DEBUG
 * Set to true in order to display debug information.
 * The functions are defined in lib/osea.php
 */
#define( 'OSEA_DEBUG', true );				// < disabled by default

/**
 * 1.2 IE 8 SUPPORT
 * Set to true to enable support for Internet Explorer 8 by:
 * 		- Loading js polyfills in header.php
 */
define( 'OSEA_IE8_SUPPORT', true );			// < enabled by default

/**
 * 1.3 OPTIMIZATION
 * Set to true in order to remove the whitespace from
 * the HTML in between wp_head and wp_footer.
 * @ see osea_after_setup_theme
 */
#define( 'OSEA_OPTIMIZE_HTML', true );		// < disabled by default


/**
 * 2 THEME FUNCTIONALITY
 * ************************************************************
 *
 * Instructions:
 * https://github.com/andamira/osea/wiki/Theme_includes
 *
 * You can customize any of these files. You can also
 * comment the includes if you prefer to use your system
 * for favicons, fonts, sidebars, etc.
 *
 */

// Core Functions & Libraries
require_once( 'lib/osea.php' );

// Admin Area Customization
#require_once( 'lib/admin.php' );			// < disabled by default

require_once( 'lib/icons.php' );
require_once( 'lib/fonts.php' );
require_once( 'lib/menus.php' );
require_once( 'lib/sidebars.php' );
require_once( 'lib/thumbnails.php' );
require_once( 'lib/titles.php' );
require_once( 'lib/entry-meta.php' ); 
require_once( 'lib/comments.php' ); 
require_once( 'lib/page-links.php' );
require_once( 'lib/no-post-found.php' );
require_once( 'lib/admin-bar.php' );


/**
 * 3 PLUGIN FUNCTIONALITY
 * ************************************************************
 * 
 * Instructions:
 * https://github.com/andamira/osea/wiki/Plugin
 *
 * This enables functionality that scapes the scope
 * of the theme: Custom post types, shortcodes, etc.
 *
 * You must customize the included file, and the files
 * it itself includes, to your particular needs.
 *
 * Remember:
 * You should make this a standalone plugin ASAP.
 * (see the wiki for instructions)
 */

include_once( 'lib/plugin/plugin-template.php' );


/**
 * 4 AFTER SETUP THEME
 * ************************************************************
 * 
 * Functions defined in lib/osea.php
 */
function osea_launch() {

	/**
	* 4.1 language support
	*/
	load_theme_textdomain( 'osea-theme', get_template_directory() . '/lib/langs' );

	/**
	* 4.2 cleanup
	*/
	add_action( 'init', 'osea_head_cleanup' );
	// a better title
	add_filter( 'wp_title', 'osea_wp_title', 10, 3 );
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
	* 4.3 enqueue base scripts and styles, including ie conditional wrapper
	*/
	add_action( 'wp_enqueue_scripts', 'osea_scripts_and_styles', 999 );

	/**
	* 4.4 custom theme features
	*/
	osea_theme_support();

	/**
	* 4.5 register sidebars ( sidebars are defined in lib/sidebars.php )
	*/
	add_action( 'widgets_init', 'osea_register_sidebars' );
}
add_action( 'after_setup_theme', 'osea_launch' );


/**
 * 5 EXTERNAL LIBRARIES & PLUGINS
 * ************************************************************
 *
 * This file controls the inclusion of third party
 * libraries, fixes & cleanups for external libraries
 * and plugins. And specific includes for some big
 * and important plugins like WPML & WooCommerce
 */
include_once( 'lib/ext.php' );


/**
 * 6 CUSTOM FUNCTIONS, ACTIONS & FILTERS
 * ************************************************************
 * 
 * Here you could put your custom functions, but
 * first better take a look at the included files
 * above, specially under THEME FUNCTIONALITY because probably there are more appropriate
 * files to put them.
 *
 * Take a look at the embedded files above,
 * specially in the THEME FUNCTIONALITY section
 * 
 */



