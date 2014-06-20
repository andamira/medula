<?php
/**
 * This is the functions.php file
 *
 *
 * Don't reinvent the wheel. Take a look to
 * http://codex.wordpress.org/Function_Reference/
 *
 *
 * 		1 Debug Options
 *
 *		2 Theme Func.
 *		3 Plugin Func.
 *		4 Third party
 *
 *		5 Launch Ósea
 *
 * 		6 Custom Func.
 *
 *
 * Author: andamira
 * URL: htp://andamira.net/osea/
 */


/**
 * 1 DEBUG OPTIONS
 *
 * Set to true for displaying debug information,
 * Debug functions are defined in lib/osea.php
 */
define( 'OSEA_DEBUG', true );


/**
 * 2 THEME FUNCTIONALITY
 *
 * Instructions:
 * https://github.com/andamira/osea/wiki/Theme_includes
 *
 * You can customize any of these files. You can also
 * comment the includes if you prefer to use your system
 * for favicons, fonts, sidebars, etc.
 *
 */

// Ósea Core Library
require_once( 'lib/osea.php' );

// Icons & Favicons
require_once( 'lib/icons.php' );
// Fonts
require_once( 'lib/fonts.php' );
// Menus
require_once( 'lib/menus.php' );
// Sidebars
require_once( 'lib/sidebars.php' );
// Thumbnails
require_once( 'lib/thumbnails.php' );
// Titles
require_once( 'lib/titles.php' );

// Entry Meta layout
require_once( 'lib/entry-meta.php' ); 
// Comments layout
require_once( 'lib/comments.php' ); 
// Not Found layout
require_once( 'lib/not-found.php' );
// Page Links
require_once( 'lib/page-links.php' );


/**
 * 3 PLUGIN FUNCTIONALITY
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
 * 4 THIRD PARTY LIBRARIES, FIXES & CLEANUP
 *
 * 'lib/3rd_party/libs.php'
 * Here you can load 3rd party libraries.
 * It alredy comes with some libraries.
 *
 * 'lib/3rd_party/fixes.php'
 * Here is where you put the fixes for the problems
 * with 3rd party libraries, plugins, etc.
 * It already comes with some examples
 *
 * 'lib/3rd_party/cleanup.php'
 * Here is where you put the code for cleaning and
 * minifying the output of libraries, plugins, etc.
 * It already comes with some examples
 *
 */
include_once( 'lib/3rd_party/libs.php' );
include_once( 'lib/3rd_party/fixes.php' );
//include_once( 'lib/3rd_party/cleanup.php' );


/**
 * 5 LAUNCH ÓSEA
 * Gets everything up and running.
 */
function osea_launch() {

  // language support
  load_theme_textdomain( 'osea-theme', get_template_directory() . '/lib/translation' );

  // launching operation cleanup
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

  // enqueue base scripts and styles, including ie conditional wrapper
  add_action( 'wp_enqueue_scripts', 'osea_scripts_and_styles', 999 );

  // custom theme features
  osea_theme_support();

  // adding sidebars to Wordpress ( defined in lib/sidebars.php )
  add_action( 'widgets_init', 'osea_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'osea_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'osea_excerpt_more' );

}
add_action( 'after_setup_theme', 'osea_launch' );


/**
 * 6 CUSTOM FUNCTIONS
 * 
 * Here you could put your custom functions, but
 * it's better to look first if there are more 
 * appropriate files to put them.
 *
 * Take a look at the embedded files above,
 * specially in the THEME FUNCTIONALITY section
 * 
 */


/**
 * OEMBED SIZE OPTIONS 
 * TODO: Move to another file
 *
 * This is the maximum width in pixels for your content area
 */

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}


