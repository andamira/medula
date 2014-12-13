<?php
/*
 * Fonts template
 *
 *      1 Google fonts
 *
 *
 * To use dowloaded fonts put them in:
 * lib/fonts/ & then load them from:
 * lib/scss/modules/_typography.scss
 *
 * You can find free fonts in:
 * @see http://www.google.com/fonts/
 * @see http://www.fontsquirrel.com/
 * @see http://openfontlibrary.org/
 *
 * And pay fonts in:
 * @see https://typekit.com/
 * @see http://www.fontspring.com/
 */


/*
 * 1 GOOGLE FONTS
 * ************************************************************
 */
function osea_fonts() {
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
}
add_action('wp_enqueue_scripts', 'osea_fonts');


