<?php
/**
 * Plugin Name: Medula P
 * Plugin URI: https://github.com/andamira/medula/
 * Description: A minimal starter plugin, and optional companion for Medula T starter theme
 * Version 0.4.10
 * Author: andamira
 * Author URI: http://andamira.net
 * Text Domain: medula-p
 * Tags: medula, boilerplate, starter, simple, minimal, developer, code, procedural, programming, functional
 * License: MIT
 * License URI: http://opensource.org/licenses/MIT
 *
 * This minimal plugin framework is simple and procedural. Is intended mainly to hold the
 * extra functionality for your custom theme. If you need something more complex and / or
 * object oriented, please use any of the fantastic boilerplates that exist. For example:
 *
 *   - https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate
 *   - https://github.com/getherbert/herbert/
 *
 * NOTE: If you decide to use this template, you have to customize each one 
 * of the included files for your particular use case, and / or extend them.
 *
 * @link https://github.com/andamira/medula/wiki/Plugin
 */


// Google Analytics Tracking Code
include( 'lib/analytics.php' );

// Load Helper Functions
include( 'lib/helpers.php' );

// Create Shortcodes
include( 'lib/shortcodes.php' );

// Create Custom Post Types
include( 'lib/post-types.php' );

// Create Custom Taxonomies
include( 'lib/taxonomies.php' );

// Create Metaboxes
include( 'lib/metaboxes.php' );


