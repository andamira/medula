<?php
/**
 * Plugin Name: Osea Plugin Example
 * Plugin URI: https://github.com/andamira/osea/wiki/Plugin
 * Description: This contains all the theme independent functionality.
 * Version 0.01
 * Author: andamira
 * Author URI: http://andamira.net
 *
 * NOTE: You must customize each of the included files
 * for your particular use case
 *
 * @see:instructions https://github.com/andamira/osea/wiki/Plugin
 *
 */

// Add Google Analytics Tracking Code
include_once( 'analytics.php' );

// Create Shortcodes
include_once( 'shortcodes.php' );

// Create Custom Post Types
include_once( 'post-types.php' );

// Create Custom Taxonomies
include_once( 'taxonomies.php' );

// Create Metaboxes
include_once( 'metaboxes.php' );

// Create Custom Admin Columns
#include_once( 'columns.php' );

