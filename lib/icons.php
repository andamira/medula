<?php
/*
 * Icons Template
 *
 *		1 Favicons
 *		2 Admin Area Favicon
 *		3 Font Icons Collection
 */



/*
 * 1 FAVICONS
 * ************************************************************
 *
 * Instructions:
 * https://github.com/andamira/osea/wiki/Favicons
 *
 * Recommended reading:
 * http://www.jonathantneal.com/blog/understand-the-favicon/
 *
 */
$favicon_version="0";

function osea_favicons() {
	global $favicon_version;
?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-touch-icon.png?v=<?php echo $favicon_version ?>">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/lib/img/favicon.png?v=<?php echo $favicon_version ?>">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=<?php echo $favicon_version ?>">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/lib/img/win8-tile-icon.png?v=<?php echo $favicon_version ?>">
<?php
}
add_action('wp_head', 'osea_favicons', 2);


/*
 * 2 ADMIN AREA FAVICON
 * ************************************************************
 *
 * This is the favicon for the WP backend
 */
add_action('admin_head', 'osea_admin_area_favicon');
function osea_admin_area_favicon() {
	global $favicon_version;
	$favicon_url = get_template_directory_uri() . "/lib/img/favicon_adm.png?v=$favicon_version";
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}


/*
 * 3 ICONS COLLECTIONS
 * ************************************************************
 *
 * Uncomment the libraries you want to use
 */

add_action( 'wp_enqueue_scripts', 'icons_collections' );
function icons_collections() {

	// DASHICONS
	wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array('dashicons'), '0.2' );

	// FONT AWESOME
	#wp_enqueue_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', null, '4.1.0' );
}



