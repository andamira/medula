<?php
/**
 * Icons Template
 *
 *     1 Favicons (& Theme Color)
 *         1.1 Frontend
 *         1.2 Backend (Admin Area)
 *
 *     2 Font Icons Collection
 *         2.1 Dashicons                      ( )
 *         2.2 Font Awesome                   (#)
 */


/**
 * 1 FAVICONS AND THEME COLOR
 * ************************************************************
 *
 * @link https://en.wikipedia.org/wiki/Favicon
 * @link http://www.jonathantneal.com/blog/understand-the-favicon/
 */

// Increase this number each time the favicons are updated
$favicon_version="0";

$medula_theme_color="#fff";

/**
 * 1.1 FRONTEND
 */
function medula_favicons() {
	global $favicon_version, $medula_theme_color;

	// 16x16 ico for Internet Explorer <11
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/res/img/favicon.ico?v=' . $favicon_version . '">';
	// 16x16 png for the rest of the browsers
	echo '<link rel="icon" href="' . get_template_directory_uri() . '/res/img/favicon.png?v=' . $favicon_version . '">';
	// 180x180 png both for Apple devices and for Microsoft Windows tiles
	echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/res/img/favicon-big.png?v=' . $favicon_version . '">';
	echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/res/img/favicon-big.png?v=' . $favicon_version . '">';
	echo '<meta name="msapplication-TileColor" content="' . $medula_theme_color . '">';

	// Theme Color @link https://github.com/whatwg/meta-theme-color
	echo '<meta name="theme-color" content="' . $medula_theme_color . '">'; 
}
add_action('wp_head', 'medula_favicons', 2);

/**
 * 1.2 BACKEND (WORDPRESS ADMIN AREA)
 */
function medula_admin_area_favicon() {
	global $favicon_version;

	echo '<link rel="icon" href="' . get_template_directory_uri() . '/res/img/favicon_adm.png?v=' . $favicon_version . '" />';
}
add_action('admin_head', 'medula_admin_area_favicon');


/**
 * 2 FONTICONS COLLECTIONS
 * ************************************************************
 *
 * Uncomment the fonticons libraries you want to use in the frontend
 */

add_action( 'wp_enqueue_scripts', 'icons_collections' );
function icons_collections() {

	/**
	 * 2.1 DASHICONS
	 * @link https://developer.wordpress.org/resource/dashicons/
	 */
	wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array('dashicons') );

	/**
	 * 2.2 FONT AWESOME
	 * @link http://fortawesome.github.io/Font-Awesome/get-started/
	 */
	# wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', null, '4.4.0' );
}


