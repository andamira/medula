<?php
/**
 * Icons Template
 *
 *     1 Favicons
 *
 *     2 Admin Area Favicon
 *
 *     3 Font Icons Collection
 */



/**
 * 1 FAVICONS
 * ************************************************************
 *
 * @link https://github.com/andamira/medula/wiki/Favicons
 * @link http://www.jonathantneal.com/blog/understand-the-favicon/
 */
$favicon_version="0";

function medula_favicons() {
	global $favicon_version;
?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png?v=<?php echo $favicon_version ?>">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png?v=<?php echo $favicon_version ?>">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=<?php echo $favicon_version ?>">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/win8-tile-icon.png?v=<?php echo $favicon_version ?>">
<?php
}
add_action('wp_head', 'medula_favicons', 2);


/**
 * 2 ADMIN AREA FAVICON
 * ************************************************************
 *
 * This is the favicon for the WP backend
 */
add_action('admin_head', 'medula_admin_area_favicon');
function medula_admin_area_favicon() {
	global $favicon_version;
	$favicon_url = get_template_directory_uri() . "/img/favicon_adm.png?v=$favicon_version";
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}


/**
 * 3 ICONS COLLECTIONS
 * ************************************************************
 *
 * Uncomment the fonticons libraries you want to use
 */

add_action( 'wp_enqueue_scripts', 'icons_collections' );
function icons_collections() {

	/**
	 * DASHICONS
	 * @link https://developer.wordpress.org/resource/dashicons/
	 */
	wp_enqueue_style( 'dashicons', get_stylesheet_uri(), array('dashicons'), '1.0.4' );

	/**
	 * FONT AWESOME
	 * @link http://fortawesome.github.io/Font-Awesome/get-started/
	 */
	# wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null, '4.3.0' );
}


