<?php
/*
 * Fonts Library Template
 *
 *     >------------------>
 *
 *     1 Load Typefaces from External Servers
 *
 *         1.1 Google Fonts                                 (#)
 *         1.2 TypeKit                                      (#)
 *
 *     2 Load Font Icons
 *
 *         2.1 Dashicons                                    (#)
 *         2.2 Font Awesome                                 (#)
 *
 *     <------------------<
 *
 * NOTE: If you prefer to self-host then you have to put the fonts in:
 *     /src/fonts/
 *
 * and configure and load them from:
 *     /src/sass/modules/_typography.scss
 */


/**
 * 2 LOAD TYPEFACES
 * ************************************************************
 */

add_action('wp_enqueue_scripts', 'medula_load_typefaces_external');

function medula_load_typefaces_external() {

	/**
	 * 1.1 GOOGLE FONTS
	 *
	 * @link http://www.google.com/fonts/
	 */

	# wp_enqueue_script('googleFonts', medula_get_protocol() . 'fonts.googleapis.com/css?family=Open+Sans:400,400italic,700');

	/**
	 * 1.2 TYPEKIT
	 *
	 * @link http://typekit.com/fonts
	 */

	 # add_action( 'wp_header', 'medula_load_typefaces_external_typekit_embed_code' );

	function medula_load_typefaces_external_typekit_embed_code() {
	?><script>

	</script><?php
	}

}


/**
 * 2 LOAD FONTICONS
 * ************************************************************
 *
 * Uncomment the fonticons libraries you want to use in the frontend.
 *
 * Use the remote version or the local version.
 *
 * For the local version you'll have to install it first and then
 * configure it in file /gulpfile.js section 2.2: Vendor Live
 */

add_action( 'wp_enqueue_scripts', 'medula_load_fonticons_external' );

function medula_load_fonticons_external() {

    /**   
     * 2.1 DASHICONS
     *
     * @link https://developer.wordpress.org/resource/dashicons/
     */

    # wp_enqueue_style( 'dashicons' );

    /**   
     * 2.2 FONT AWESOME
     *
     * @link http://fortawesome.github.io/Font-Awesome/get-started/
     */

    // Remote
    # wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', null, '4.6.3' );

    // Local
    # wp_enqueue_style( 'fontawesome', medula_get_theme_resources_uri('js/vendor/font-awesome/font-awesome.min.css'), null, '4.6.3' );
}
