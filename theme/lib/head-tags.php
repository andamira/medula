<?php
/**
 * Head Tags Template
 *
 *
 *     1 Favicons (& Theme Color)
 *         1.1 Frontend
 *         1.2 Backend (Admin Area)
 *
 *     2 Pingbacks                                                (#)
 *
 *     3 Main Meta Tags
 *
 *     4 Font Icons Collection
 *         4.1 Dashicons                                          (#)
 *         4.2 Font Awesome                                       (#)
 */


/**
 * 1 FAVICONS AND THEME COLOR
 * ************************************************************
 *
 * @link https://en.wikipedia.org/wiki/Favicon
 * @link http://www.jonathantneal.com/blog/understand-the-favicon/
 */

// Increase this number each time the favicons are updated
$medula_favicon_v="0";

// This will be used on some systems to customize their UI
$medula_theme_color=""; // e.g. #ffffff

/**
 * 1.1 FRONTEND
 */
function medula_header_tags_frontend_favicons_theme_color() {
	global $medula_favicon_v, $medula_theme_color;

	// 16x16 ico for Internet Explorer <11
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/res/img/favicon.ico?v=' . $medula_favicon_v . '">';
	// 16x16 png for the rest of the browsers
	echo '<link rel="icon" href="' . get_template_directory_uri() . '/res/img/favicon.png?v=' . $medula_favicon_v . '">';
	// 180x180 png both for Apple devices and for Microsoft Windows tiles
	echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/res/img/favicon-big.png?v=' . $medula_favicon_v . '">';
	echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/res/img/favicon-big.png?v=' . $medula_favicon_v . '">';

	if ($medula_theme_color) {
		// @link https://msdn.microsoft.com/en-us/library/dn255024(v=vs.85).aspx#msapplication-TileColor
		echo '<meta name="msapplication-TileColor" content="' . $medula_theme_color . '">';

		// @link https://github.com/whatwg/meta-theme-color
		echo '<meta name="theme-color" content="' . $medula_theme_color . '">';
	}
}
add_action('wp_head', 'medula_header_tags_frontend_favicons_theme_color', 2);

/**
 * 1.2 BACKEND (WORDPRESS ADMIN AREA)
 */
function medula_header_tags_favicon_backend() {
	global $medula_favicon_v;

	echo '<link rel="icon" href="' . get_template_directory_uri() . '/res/img/favicon_adm.png?v=' . $medula_favicon_v . '" />';
}
add_action('admin_head', 'medula_header_tags_favicon_backend');


/**
 * 2 PINGBACKS
 * ************************************************************
 *
 * Self pings are disabled in medula.php
 *
 * @link http://codex.wordpress.org/Glossary#Pingback
 */
function medula_header_tags_pingback() {
	echo '<link rel="pingback" href="' . bloginfo('pingback_url') . '">';
}
# add_action('admin_head', 'medula_header_tags_pingback');


/**
 * 3 Main Meta Tags
 * ************************************************************
 */
function medula_header_tags_main() {

?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<?php

}
add_action('wp_head', 'medula_header_tags_main', 0);


/**
 * 4 FONTICONS COLLECTIONS
 * ************************************************************
 *
 * Uncomment the fonticons libraries you want to use in the frontend
 */

add_action( 'wp_enqueue_scripts', 'icons_collections' );
function icons_collections() {

	/**
	 * 4.1 DASHICONS
	 * @link https://developer.wordpress.org/resource/dashicons/
	 */
	# wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array('dashicons') );

	/**
	 * 4.2 FONT AWESOME
	 * @link http://fortawesome.github.io/Font-Awesome/get-started/
	 */
	# wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', null, '4.4.0' );
}

