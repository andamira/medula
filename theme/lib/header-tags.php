<?php
/**
 * Header Tags Template
 *
 *
 *     1 Main Tags
 *
 *     2 Favicons (& Theme Color)
 *         2.1 Frontend
 *         2.2 Backend (Admin Area)
 *
 *     3 Pingbacks                            (#)
 *
 *     4 Font Icons Collection
 *         4.1 Dashicons                      (#)
 *         4.2 Font Awesome                   (#)
 */


/**
 * 1 Main Tags
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
 * 2 FAVICONS AND THEME COLOR
 * ************************************************************
 *
 * @link https://en.wikipedia.org/wiki/Favicon
 * @link http://www.jonathantneal.com/blog/understand-the-favicon/
 */

// Increase this number each time the favicons are updated
$favicon_version="0";

// Color used on some systems to customize their UIs when visiting your page
$medula_theme_color=""; // #ffffff

/**
 * 2.1 FRONTEND
 */
function medula_header_tags_frontend_favicons_theme_color() {
	global $favicon_version, $medula_theme_color;

	// 16x16 ico for Internet Explorer <11
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/res/img/favicon.ico?v=' . $favicon_version . '">';
	// 16x16 png for the rest of the browsers
	echo '<link rel="icon" href="' . get_template_directory_uri() . '/res/img/favicon.png?v=' . $favicon_version . '">';
	// 180x180 png both for Apple devices and for Microsoft Windows tiles
	echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/res/img/favicon-big.png?v=' . $favicon_version . '">';
	echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/res/img/favicon-big.png?v=' . $favicon_version . '">';

	if ($medula_theme_color) {
		// @link https://msdn.microsoft.com/en-us/library/dn255024(v=vs.85).aspx#msapplication-TileColor
		echo '<meta name="msapplication-TileColor" content="' . $medula_theme_color . '">';

		// Theme Color @link https://github.com/whatwg/meta-theme-color
		echo '<meta name="theme-color" content="' . $medula_theme_color . '">';
	}
}
add_action('wp_head', 'medula_header_tags_frontend_favicons_theme_color', 2);

/**
 * 2.2 BACKEND (WORDPRESS ADMIN AREA)
 */
function medula_header_tags_favicon_backend() {
	global $favicon_version;

	echo '<link rel="icon" href="' . get_template_directory_uri() . '/res/img/favicon_adm.png?v=' . $favicon_version . '" />';
}
add_action('admin_head', 'medula_header_tags_favicon_backend');


/**
 * 3 PINGBACKS
 * ************************************************************
 *
 * @link http://codex.wordpress.org/Glossary#Pingback Pingbacks
 */
function medula_header_tags_pingback() {
	echo '<link rel="pingback" href="' . bloginfo('pingback_url') . '">';
}
# add_action('admin_head', 'medula_header_tags_pingback');


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


