<?php
/**
 * WP-Types Support Template
 *
 *     1 Disable CSS & JS
 *
 *     2 Disable edit post link
 *
 * @link http://wp-types.com
 */


/**
 * 1 Dequeue wp-types front-end scripts and stylesheets
 *
 */
add_action('wp_enqueue_scripts', 'prefix_remove_views_assets', 20);
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
 * 2 Disable edit post link
 */

add_filter( 'edit_post_link', '__return_false' );

