<?php
/**
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard. It's turned off by default, but you
 * can call it via the functions file.
 *
 *		1 Remove default dashboard wigets
 *		2 Custom dashboard widgets
 *		3 Customizing the Login Page
 *		4 changing text in footer of admin
 *
 * Recommended Reading:
 * http://digwp.com/2010/10/customize-wordpress-dashboard/
 */


/**
 * 1 REMOVE DEFAULT DASHBOARD WIDGETS
 *
 * Comment/Uncomment the ones you want to maintain/remove
 */

function disable_default_dashboard_widgets() {

	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );			// Right Now Widget
	remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );			// Activity widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );	// Comments Widget
	//remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );		// Incoming Links Widget
	//remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );			// Plugins Widget
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );		// Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );		// Recent Drafts Widget

	// Plugins' dashboard boxes
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );			// Yoast's SEO
	remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' );		// WPML
	remove_meta_box( 'blc_dashboard_widget', 'dashboard', 'normal' );		// Broken Link Checker
}
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );



/**
 * 2 CUSTOM WIDGETS
 *
 * Now let's talk about adding your own custom Dashboard widget.
 * Sometimes you want to show clients feeds relative to their
 * site's content. For example, the NBA.com feed for a sports
 * site. Here is an example Dashboard Widget that displays recent
 * entries from an RSS Feed.
 *
 * Recommended reading:
 * http://digwp.com/2010/10/customize-wordpress-dashboard/
 * 
 */

// Example Dashboard Widget
function osea_example_dashboard_widget() {
	?>
	<h1> </h1>
	<p>You can edit this message in /lib/admin.php and add your own widgets</p>
	<?php
}

/**
 * Drop here all the Custom Widgets to load them
 */
function osea_custom_dashboard_widgets() {
	wp_add_dashboard_widget( 'osea_example_dashboard_widget', __( 'Example Dashboard Widget (Ósea)', 'osea-theme' ), 'osea_example_dashboard_widget' );

}
add_action( 'wp_dashboard_setup', 'osea_custom_dashboard_widgets' );


/**
 * 3 CUSTOM LOGIN PAGE
 *
 * You can edit the style in /lib/scss/login.scss
 */
function osea_login_css() {
	wp_enqueue_style( 'osea_login_css', get_template_directory_uri() . '/lib/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function osea_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function osea_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'osea_login_css', 10 );
add_filter( 'login_headerurl', 'osea_login_url' );
add_filter( 'login_headertitle', 'osea_login_title' );


/**
 * 4 CUSTOMIZE ADMIN
 *
 * Put
 */

// Custom Backend Footer
function osea_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://yoursite.com" target="_blank">Your Site Name</a></span>. Built using <a href="http://andamira.net/osea" target="_blank">Ósea</a>.', 'osea-theme' );
}
add_filter( 'admin_footer_text', 'osea_custom_admin_footer' );

?>
