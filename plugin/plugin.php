<?php
/**
 * Plugin Name: Medula-P
 * Plugin URI: https://github.com/andamira/medula/
 * Description: A minimal starter plugin, and optional companion for Medula T starter theme
 * Version 0.5.2
 * Author: andamira
 * Author URI: http://andamira.net
 * Text Domain: medulap
 * Tags: medula, boilerplate, starter, simple, minimal, developer, code, procedural, programming, functional
 * License: MIT
 * License URI: http://opensource.org/licenses/MIT
 *
 *
 *     1 Globals
 *
 *         1.1 Plugin Resources URI
 *
 *     2 Plugin Functionality
 *
 *         2.1 Helper Functions
 *
 *         2.2 Custom Post Types & Taxonomies
 *         2.3 Shortcodes                                   (#)
 *         2.4 Metaboxes                                    (#)
 *         2.5 Options Page                                 (#)
 *
 *         2.6 Analytics                                    (#)
 *
 *         2.7 Compression & Cache                          (#)
 *
 *     3 After Setup Plugin
 *
 *         3.1 Language Support
 *         3.2 Load Base Scripts & Styles
 *
 *     4 External Libraries                                 (#)
 *
 *     5 Custom Functions, Actions & Filters
 *
 *
 * NOTE: This minimal plugin framework is simple and procedural. It is intended mainly for
 * the extra functionality of your custom theme. If you need something more complex or
 * object oriented, use any of the other great fantastic boilerplates. For example:
 *
 *   - https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate
 *   - https://github.com/getherbert/herbert/
 */

/**
 * 1 GLOBALS
 * ************************************************************
 */

/**
 * 1.1 Returns the plugin resources URI, with an optional $subpath parameter
 * NOTE: This must match the PLUGIN_RESOURCES global in /gulpfile.js
 */

function medula_get_plugin_resources_uri( $subpath = '' ){
    return plugins_url( '/res/' . $subpath );
}


/**
 * 2 PLUGIN FUNCTIONALITY
 * ************************************************************
 *
 */

require_once( 'lib/utility.php' );                // Utility Functions (Helpers)

require_once( 'lib/custom-post-tax.php' );        // Custom Post Types & Taxonomies
# require_once( 'lib/shortcodes.php' );           // Create Shortcodes
# require_once( 'lib/metaboxes.php' );            // Create Metaboxes
# require_once( 'lib/options-page.php' );         // Settings API Options Page

# require_once( 'lib/analytics.php' );            // Google Analytics Tracking Code

# require_once( 'lib/compression-caching.php' );  // Compression and Caching


/**
 * 4 EXTERNAL LIBRARIES & PLUGINS
 * ************************************************************
 */

# include_once( 'lib/vendor/main.php' );


/**
 * 5 CUSTOM FUNCTIONS, ACTIONS & FILTERS
 * ************************************************************
 *
 * Here you could put some quick & dirty custom functions, but
 * before doing that it would be better to take a look at the
 * indexed sections above, and try to find a better place.
 *
 */


