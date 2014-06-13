<?php
/*
 * Icons Template
 *
 * INDEX:
 *		Favicons
 *		Admin Area Favicon
 *		Font Icons Collection
 */



/*
 * FAVICONS
 *
 * Instructions:
 * https://github.com/andamira/osea/wiki/Favicons
 *
 * Recommended reading:
 * http://www.jonathantneal.com/blog/understand-the-favicon/
 *
 */
function osea_favicons() {
	$favicon_version="0";
?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-touch.png"<?php ?>>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/lib/img/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/lib/img/win8-tile-icon.png">
<?php
}
add_action('wp_head', 'osea_favicons', 2);


/*
 * ADMIN AREA FAVICON
 *
 * This is the favicon for the WP backend
 */
function osea_admin_area_favicon() {
	$favicon_url = get_template_directory_uri() . '/lib/img/favicon_adm.png?v=0';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('admin_head', 'osea_admin_area_favicon');


/*
 * ICONS COLLECTIONS
 *
 *
 */

add_action( 'wp_enqueue_scripts', 'icons_collections' );
function icons_collections() {
	// DASHICONS
	//wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array('dashicons'), '0.2' );

	// FONT AWESOME
	//wp_enqueue_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', null, '4.1.0' );
}




?>
