<?php
/**
 * Toolset Support Template
 *
 *     1 Toolset Layouts
 *
 *         1.1 Helper functions
 *         1.2 Load Custom Cells Layouts
 *         1.3 Load Custom Theme Layouts
 *
 *     2 Disable Toolset CSS & JS
 *
 *     3 Disable edit post link
 *
 *
 * @link http://wp-types.com Toolset
 */

/**
 * 1 Toolset Layouts Theme Support
 *
 */

/**
 * 1.1 Helper functions
 */
//Helper function to check if Layouts is activated
if (!function_exists('wpbootstrap_toolset_layouts_activated')) {

	function wpbootstrap_toolset_layouts_activated() {

		$activated=false;
	 
		if( defined('WPDDL_VERSION') ) {
			global $wpddlayout;

			if (is_object($wpddlayout))  {
				$activated=true;
			}
		}
		return $activated;
	}	
}


/**
 * 1.2 Custom Cells
 *
 * @link http://wp-types.com/documentation/user-guides/layouts-cells-api/
 */
if( class_exists( 'WPDD_Layouts' ) && !function_exists( 'include_ddl_layouts' ) ) {
	/*
	function include_ddl_layouts( $tpls_dir = '' ) {
		$dir_str = dirname(__FILE__) . $tpls_dir;
		$dir = opendir( $dir_str );
		while( ( $currentFile = readdir($dir) ) !== false ) {
			if ( $currentFile == '.' || $currentFile == '..' || $currentFile[0] == '.' ) {
				continue;
			}
			include $dir_str.$currentFile;
		}
		closedir($dir);
	}
	include_ddl_layouts('/toolset/cells/');
	/**/
}


/**
 * 2 Dequeue Toolset front-end scripts and stylesheets
 *
 */
# add_action('wp_enqueue_scripts', 'prefix_remove_views_assets', 20);
function prefix_remove_views_assets() {

	// Scripts
	// ------
	// views_front_end_utils.js - used in Views parametric searches
	wp_deregister_script( 'wpv-front-end-utils' );

	// wpv-pagination-embedded.js - used in Views pagination and table sorting
	wp_deregister_script( 'views-pagination-script' );

	// jquery.ui.datepicker.min.js and wpv-date-front-end-control.js - used in Views parametric searches by a date field
	wp_deregister_script( 'jquery-ui-datepicker' );
	wp_deregister_script( 'wpv-date-front-end-script' );

	// Styles
	// ------
	// wpv-views-sorting.css - used in Views table sorting
	wp_deregister_style( 'views-table-sorting-style' );

	// wpv-pagination.css -used in Views pagination
	wp_deregister_style( 'views-pagination-style' );
}


/**
 * 3 Disable edit post link
 */

add_filter( 'edit_post_link', '__return_false' );


