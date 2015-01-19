<?php
/*
 * Fonts template
 *
 *     1 Google fonts
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


/*
 * 1 GOOGLE FONTS
 * ************************************************************
 */
function osea_fonts() {
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
}
add_action('wp_enqueue_scripts', 'osea_fonts');


