<?php
/**
 * Head Tags Template
 *
 *     >------------------>
 *
 *     1 Favicons (& Theme Color)
 *         1.1 Frontend                                           (#)
 *         1.2 Backend (Admin Area)                               (#)
 *
 *     2 Pingbacks                                                (#)
 *
 *     3 Main Meta Tags
 *
 *     <------------------<
 */


/**
 * 1 FAVICONS AND THEME COLOR
 * ************************************************************
 *
 * @link https://en.wikipedia.org/wiki/Favicon
 * @link http://www.jonathantneal.com/blog/understand-the-favicon/
 */

// Favicon version should be increased every time the favicons change, to avoid cache problems
$medula_favicon_v="0";

// This will be used on some systems to customize their UI
$medula_theme_color=""; // e.g. #ffffff

/**
 * 1.1 FRONTEND
 *
 * Create a 16x16 favicon and put it in:
 *     - /src/img/favicon.png and /src/img/favicon.ico
 *     - /src/img/favicon.png and /src/img/favicon.png
 *
 * Create a 180x180 favicon and put it in:
 *     - /src/img/favicon-big.png
 */

# add_action('wp_head', 'medula_header_tags_frontend_favicons_theme_color', 2);

function medula_header_tags_frontend_favicons_theme_color() {
	global $medula_favicon_v, $medula_theme_color;

	// 16x16 ico for Internet Explorer <11
	echo '<link rel="shortcut icon" href="' . medula_get_theme_resources_uri('img') . '/favicon.ico?v=' . $medula_favicon_v . '">';

	// 16x16 png for the rest of the browsers
	echo '<link rel="icon" href="' . medula_get_theme_resources_uri('img') . '/favicon.png?v=' . $medula_favicon_v . '">';

	// 180x180 png both for Apple devices and for Microsoft Windows tiles
	echo '<link rel="apple-touch-icon" href="' . medula_get_theme_resources_uri('img') . '/favicon-big.png?v=' . $medula_favicon_v . '">';
	echo '<meta name="msapplication-TileImage" content="' . medula_get_theme_resources_uri('img') . '/favicon-big.png?v=' . $medula_favicon_v . '">';

	if ($medula_theme_color) {
		// @link https://msdn.microsoft.com/en-us/library/dn255024(v=vs.85).aspx#msapplication-TileColor
		echo '<meta name="msapplication-TileColor" content="' . $medula_theme_color . '">';

		// @link https://html.spec.whatwg.org/multipage/semantics.html#meta-theme-color
		echo '<meta name="theme-color" content="' . $medula_theme_color . '">';
	}
}

/**
 * 1.2 BACKEND (ADMIN AREA)
 *
 * Create a 16x16 favicon and put it in /src/img/favicon-adm.png
 */

# add_action('admin_head', 'medula_header_tags_favicon_backend');

function medula_header_tags_favicon_backend() {
	global $medula_favicon_v;

	echo '<link rel="icon" href="' . medula_get_theme_resources_uri('img') . '/favicon-adm.png?v=' . $medula_favicon_v . '" />';
}


/**
 * 2 PINGBACKS
 * ************************************************************
 *
 * Self pings are disabled in medula.php
 *
 * @link http://codex.wordpress.org/Glossary#Pingback
 */

# add_action('admin_head', 'medula_header_tags_pingback');

function medula_header_tags_pingback() {
	echo '<link rel="pingback" href="' . bloginfo('pingback_url') . '">';
}


/**
 * 3 MAIN META TAGS
 * ************************************************************
 */

add_action('wp_head', 'medula_header_tags_main', 0);

function medula_header_tags_main() {
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<?php
}


