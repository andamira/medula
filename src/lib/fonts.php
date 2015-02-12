<?php
/*
 * Fonts template
 *
 * Here you can load fonts from external
 * servers, using @font-face
 *
 *
 *     1 Google fonts
 *
 *     2 Other
 *
 *
 * If you prefer to use self-hosted fonts
 * you have to put them in: /src/fonts/
 * and then load them from:
 * /src/sass/modules/_typography.scss
 *
 * You can find free fonts in:
 * @link http://www.google.com/fonts/
 * @link http://www.fontsquirrel.com/
 * @link http://openfontlibrary.org/
 *
 * And pay fonts in:
 * @link https://typekit.com/
 * @link http://www.fontspring.com/
 * @link http://www.myfonts.com/
 */


function osea_fonts() {

	/**
	 * 1 GOOGLE FONTS
	 */
	wp_register_style('googleFonts', osea_get_protocol() . 'fonts.googleapis.com/css?family=Open+Sans:400,400italic,700');
	wp_enqueue_style( 'googleFonts' );


	/**
	 * 2 OTHER
	 */

}
add_action('wp_print_styles', 'osea_fonts');


