<?php
/**
 * Plugin Name: Medula Plugin
 * Plugin URI: https://github.com/andamira/medula/
 * Description: This is a minimal plugin template that accompains Médula (Starter) Theme
 * Version 0.4.10
 * Author: andamira
 * Author URI: http://andamira.net
 * Text Domain: medula-plugin
 * Tags: starter-plugin, starter, simple, minimal, flexible, developer, code, procedural, programming, functional
 *
 *
 * This plugin framework is very simple and procedural.
 * If you need a more complex framework, you could try:
 *
 *   - https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate
 *   - http://getherbert.com/
 *
 * NOTE: If you decide to use this template, you must customize each one 
 * of the included files for your particular use case, and/or extend them.
 *
 * @link https://github.com/andamira/medula/wiki/Plugin
 */


// Google Analytics Tracking Code
include_once( 'lib/analytics.php' );

// Load Helper Functions
include_once( 'lib/helpers.php' );

// Create Shortcodes
include_once( 'lib/shortcodes.php' );

// Create Custom Post Types
include_once( 'lib/post-types.php' );

// Create Custom Taxonomies
include_once( 'lib/taxonomies.php' );

// Create Metaboxes
include_once( 'lib/metaboxes.php' );


