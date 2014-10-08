<?php
/*
 * Fonts template
 *
 * 		1 Google fonts
 */


/*
 * 1 GOOGLE FONTS
 * ************************************************************
 */

function osea_fonts() {
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
}
add_action('wp_print_styles', 'osea_fonts');



