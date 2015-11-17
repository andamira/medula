<?php
/**
 * Admin Bar Library Template
 *
 *     >------------------>
 *
 *     1 Theme Support                                      (#)
 *
 *     2 Callback Function
 *
 *     3 Selective Disabling                                (#)
 *
 *     <------------------<
 */


/**
 * 1 THEME SUPPORT
 * ************************************************************
 *
 * Enable to override the default behaviour of the admin toolbar
 */

# add_theme_support( 'admin-bar', array( 'callback' => 'medula_adminbar_cb' ) );


/**
 * 2 CALLBACK FUNCTION
 * ************************************************************
 *
 * The Default Admin Bar Callback
 *
 * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/admin-bar.php
 */

function medula_adminbar_cb() {

?>
<style type="text/css" media="screen">
	html { margin-top: 32px !important; }
	* html body { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
</style>
<?php

}


/**
 * 3 SELECTIVE DISABLING OF THE ADMIN BAR
 * ************************************************************
 */

// show admin bar only for admins
if (!current_user_can('manage_options')) {

	# add_filter('show_admin_bar', '__return_false');

}

// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {

	# add_filter('show_admin_bar', '__return_false');

}

