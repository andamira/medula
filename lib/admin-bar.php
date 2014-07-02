<?php
/**
 * Admin Bar template
 *
 *		1 Theme Support
 *		2 Callback
 *		3 Selective Disabling
 */


/**
 * 1 THEME SUPPORT
 * ************************************************************
 *
 */
add_theme_support( 'admin-bar', array( 'callback' => 'osea_adminbar_cb' ) );


/**
 * 2 CALLBACK FUNCTION
 * ************************************************************
 *
 * Disable inline styling, we're gonna use scss for that
 *
 * @see:styles /lib/scss/modules/_admin_bar.scss
 * @see:styles /lib/scss/breakpoints/base/_menus.scss
 * @see:source {WP_FOLDER}/wp-includes/admin-bar.php Original WordPress Code
 */
function osea_adminbar_cb() {
/* ?>
<style type="text/css" media="screen">
	html { margin-top: 32px !important; }
	* html body { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
</style>
<?php /**/
}



/*
 * 3 SELECTIVE DISABLING OF THE ADMIN BAR
 * ************************************************************
 */

// show admin bar only for admins
if (!current_user_can('manage_options')) {
	#add_filter('show_admin_bar', '__return_false');
}
// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
	#add_filter('show_admin_bar', '__return_false');
}


