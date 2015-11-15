<?php
/**
 * This file handles the admin area and functions.
 * You can use this file to make changes to the
 * dashboard. It's turned off by default, but you
 * can call it via the functions file.
 *
 *     1 Remove default dashboard wigets
 *
 *     2 Custom dashboard widgets                           (#)
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

# add_action( 'admin_menu', 'medula_disable_default_dashboard_widgets' );

function medula_disable_default_dashboard_widgets() {

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

# add_action( 'wp_dashboard_setup', 'medula_custom_dashboard_widgets' );

/**
 * 2.1 Load the Custom Widgets
 */

function medula_custom_dashboard_widgets() {
	wp_add_dashboard_widget( 'medula_example_dashboard_widget', __( 'Example Dashboard Widget (Medula)', 'medula' ), 'medula_example_dashboard_widget' );

}

/**
 * 2.2 Define here all the Custom Widgets
 */
function medula_example_dashboard_widget() {
	echo '<h1>' . esc_html('Medula Example Widget', 'medula') . '</h1>';
	echo '<p>' .
		esc_html__('You can edit this message in /theme/lib/admin.php and add your own widgets, and modify the disabled defaults.', 'medula') .
		'</p>';
}


/**
 * 3 CUSTOM LOGIN PAGE
 * ************************************************************
 *
 * You can edit the style in /src/sass/login.scss
 */
function medula_login_css() {
	wp_enqueue_style( 'medula_login_css', medula_get_theme_resources_uri('css/login.css'), false );
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
add_action( 'admin_enqueue_scripts', 'medula_load_admin_styles' );

function medula_load_admin_styles() {
	wp_enqueue_style( 'admin_css', medula_get_theme_resources_uri('css/admin/main.css') );
}  

/**
 * 4.2 Custom TinyMCE Editor Stylesheet
 */
add_editor_style( medula_get_theme_resources_uri('css/admin/editor.css') );

/**
 * 4.3 TODO: Custom TinyMCE buttons
 * @link http://codex.wordpress.org/TinyMCE_Custom_Buttons
 */


/**
 * 4.4 Changing text in footer of admin
 */
add_filter( 'admin_footer_text', 'medula_custom_admin_footer' );

function medula_custom_admin_footer() {
	$your_name="...";
	$your_url="#";
	// $your_logo=medula_get_theme_resources_uri("/img/my-logo.png")

	printf(
		'<span id="footer-thankyou">' . esc_html__( 'Developed by %1$s', 'medula' ) . '</span>.',
		'<a href="' . $your_url . '">' . $your_name
			. (!empty($your_logo) ? '<img style="margin:0;vertical-align:text-bottom;" src="' . $your_logo . '" alt="" height="25" width="25">': '')
		. '</a>'
	);
	printf(
		' ' . esc_html__('Built using %s.', 'medula'),
		'<a class="andamira" href="https://github.com/andamira/medula" target="_blank">andamira Medula</a>'
	);
}


/**
 * 5 OPTIONS PAGE
 * ************************************************************
 *
 */
include_once( 'admin-options.php' );


