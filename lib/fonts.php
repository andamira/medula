<?php
/*
 * Fonts template
 *
 */


/*
 * GOOGLE FONTS
 */

function osea_fonts() {
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
	wp_enqueue_style( 'googleFonts');
}
add_action('wp_print_styles', 'osea_fonts');



