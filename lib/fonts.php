<?php
/*
 * Fonts template
 *
 *     1 Google fonts
 *     2 Other
 *
 *
 * To use dowloaded fonts put them in:
 * lib/fonts/ & then load them from:
 * lib/sass/modules/_typography.scss
 *
 * You can find free fonts in:
 * @link http://www.google.com/fonts/
 * @link http://www.fontsquirrel.com/
 * @link http://openfontlibrary.org/
 *
 * And pay fonts in:
 * @link https://typekit.com/
 * @link http://www.fontspring.com/
 */


function osea_fonts() {

	/**
	 * 1 GOOGLE FONTS
	 */
	wp_register_style('googleFonts', osea_get_protocol() . 'fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
	wp_enqueue_style( 'googleFonts' );


	/**
	 * 2 OTHER
	 */

}
add_action('wp_print_styles', 'osea_fonts');


