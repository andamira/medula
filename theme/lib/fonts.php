<?php
/*
 * Fonts Library Template
 *
 * Here you can load fonts from external servers, using @font-face
 *
 *
 *     1 Google fonts                                       (#)
 *
 *
 * If you prefer to use self-hosted fonts you have to put them in: /src/fonts/
 * and then load them from: /src/sass/modules/_typography.scss
 *
 * You can find free fonts in:
 * @link http://www.google.com/fonts/
 * @link http://www.fontsquirrel.com/
 * @link http://openfontlibrary.org/
 *
 * And commercial fonts in:
 * @link https://typekit.com/
 * @link http://www.fontspring.com/
 * @link http://www.myfonts.com/
 */

add_action('wp_enqueue_scripts', 'medula_fonts');

function medula_fonts() {

	/**
	 * 1 GOOGLE FONTS
	 */

	# wp_enqueue_script('googleFonts', medula_get_protocol() . 'fonts.googleapis.com/css?family=Open+Sans:400,400italic,700');


}

