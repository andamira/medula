<?php
/**
 * Plugin Name: Medula (Osea)
 * Plugin URI: https://github.com/andamira/osea/wiki/Medula
 * Description: This plugin contains all the theme independent functionality.
 * Version 0.3.0
 * Author: andamira
 * Author URI: http://andamira.net
 *
 *
 * Medula is a minimal plugin template already included in Ósea.
 *
 *   - You can access this functionality very easily, just by uncommenting
 *     the corresponding line in the functions.php file (section 5).
 *
 *   - You could also move this folder into the WordPress plugins folder
 *     and use it as a standalone plugin, if you prefer to separate
 *     functionality from presentation.
 *
 *   - If you have need for a more complex plugin framework, you could use
 *     {@link https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate
 *     Wordpress Plugin Boilerplate} or {@link http://getherbert.com/
 *     Herbert Plugin Framework} instead, or your own solution.
 *
 * NOTE: If you decide to use Medula, you must customize each one 
 * of the included files for your particular use case
 *
 * @link https://github.com/andamira/osea/wiki/Medula
 */

// Google Analytics Tracking Code
include_once( 'analytics.php' );

// Load Helper Functions
include_once( 'helpers.php' );

// Create Shortcodes
include_once( 'shortcodes.php' );

// Create Custom Post Types
include_once( 'post-types.php' );

// Create Custom Taxonomies
include_once( 'taxonomies.php' );

// Create Metaboxes
include_once( 'metaboxes.php' );

