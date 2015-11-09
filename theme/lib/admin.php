<?php
/**
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard. It's turned off by default, but you
 * can call it via the functions file.
 *
 *     1 Remove default dashboard wigets
 *
 *     2 Custom dashboard widgets
 *
 *         2.1 Load
 *         2.2 Define
 *
 *     3 Customizing the Login Page
 *
 *     4 Customize Admin
 *
 *         4.1 Custom Admin Stylesheets
 *         4.2 Custom TinyMCE Editor Stylesheet
 *         4.3 TODO: Custom TinyMCE buttons
 *         4.4 Changing text in footer of admin
 *
 *     5 Options Page
 *
 * @link http://digwp.com/2010/10/customize-wordpress-dashboard/
 */


/**
 * 1 REMOVE DEFAULT DASHBOARD WIDGETS
 * ************************************************************
 *
 * Comment/Uncomment the ones you want to maintain/remove
 */
function disable_default_dashboard_widgets() {

	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );         // Right Now Widget
	remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );          // Activity widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );   // Comments Widget
	#remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );   // Incoming Links Widget
	#remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );          // Plugins Widget
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );       // Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );     // Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );           // WordPress News
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );         //

	// Plugins' dashboard boxes
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );           // Yoast's SEO
	remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' );      // WPML
	remove_meta_box( 'blc_dashboard_widget', 'dashboard', 'normal' );      // Broken Link Checker
}
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );


/**
 * 2 CUSTOM DASHBOARD WIDGETS
 * ************************************************************
 *
 * Now let's talk about adding your own custom Dashboard widget.
 * Sometimes you want to show clients feeds relative to their
 * site's content. For example, the NBA.com feed for a sports
 * site. Here is an example Dashboard Widget that displays recent
 * entries from an RSS Feed.
 *
 * @link http://digwp.com/2010/10/customize-wordpress-dashboard/
 */

/**
 * 2.1 Load the Custom Widgets
 */
function medula_custom_dashboard_widgets() {
	wp_add_dashboard_widget( 'medula_example_dashboard_widget', __( 'Example Dashboard Widget (Medula)', 'medula' ), 'medula_example_dashboard_widget' );

}
add_action( 'wp_dashboard_setup', 'medula_custom_dashboard_widgets' );


/**
 * 2.2 Define here all the Custom Widgets
 */
function medula_example_dashboard_widget() {
	?>
	<h1> </h1>
	<p>You can edit this message in /theme/lib/admin.php and add your own widgets, and restore the disabled defaults.</p>
	<?php
}


/**
 * 3 CUSTOM LOGIN PAGE
 * ************************************************************
 *
 * You can edit the style in /src/sass/login.scss
 */
function medula_login_css() {
	wp_enqueue_style( 'medula_login_css', get_template_directory_uri() . '/res/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function medula_login_url() { return home_url(); }

// changing the alt text on the logo to show your site name
function medula_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'medula_login_css', 10 );
add_filter( 'login_headerurl', 'medula_login_url' );
add_filter( 'login_headertitle', 'medula_login_title' );


/**
 * 4 CUSTOMIZE ADMIN
 * ************************************************************
 *
 */

/**
 * 4.1 Custom Admin Stylesheets
 */
function load_admin_styles() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/res/css/admin/main.css' );
}  
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );

/**
 * 4.2 Custom TinyMCE Editor Stylesheet
 */
add_editor_style( get_template_directory_uri() . '/res/css/admin/editor.css' );

/**
 * 4.3 TODO: Custom TinyMCE buttons
 * @link http://codex.wordpress.org/TinyMCE_Custom_Buttons
 */


/**
 * 4.4 Changing text in footer of admin
 */
function medula_custom_admin_footer() {
	$your_site_name="...";
	$your_site_url="#";

	printf(
		'<span id="footer-thankyou">' . esc_html__( 'Developed by %1$s', 'medula' ) . '</span>.',
		'<a href="' . $your_site_url . '">' . $your_site_name . '</a>'
	);
	printf(
		' ' . esc_html__('Built using %s.', 'medula'),
		'<a class="andamira" href="https://github.com/andamira/medula" target="_blank">andamira Medula</a>'
	);
}
add_filter( 'admin_footer_text', 'medula_custom_admin_footer' );


/**
 * 5 OPTIONS PAGE
 * ************************************************************
 *
 */
include_once( 'admin-options.php' );


