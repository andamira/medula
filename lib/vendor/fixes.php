<?php
/**
 * External Libraries & Plugins Fixes
 *
 *		1 Custom Post Type Tags Fix
 *		2 Relevanssi highlighting on Types
 *		3 Foobar Notification Bars & Admin Bar fix
 *
 * NOTE: Uncomment the ones you want to use. Add yours at the end.
 */





/**
 * 1 CPT TAGS FIX
 * ************************************************************
 * @see http://wordpress.stackexchange.com/questions/13237/custom-post-type-tag-archives-dont-work-for-basic-loop
 */
#add_filter('request', 'post_type_tags_fix');
function post_type_tags_fix($request) {
	if ( isset($request['tag']) && !isset($request['post_type']) ) {
		$request['post_type'] = 'any';
		return $request;
	}
}


/**
 * 2 USING RELEVANSSI HIGHTLIGHTING ON TYPES
 * ************************************************************
 * @see http://wp-types.com/forums/topic/the_excerpt-and-relevanssi/
 */
#add_shortcode('relevanssi-excerpt', 'f_relevanssi_excerpt');
function f_relevanssi_excerpt() {
	ob_start();
	relevanssi_the_excerpt();
	$summary .= ob_get_contents();
	ob_end_clean();
	return $summary;
}


/**
 * FOOBAR WordPress Notification Bars FIX
 * ************************************************************
 * By hiding the content when admin bar is active
 *
 * @see http://forrst.com/posts/Fix_Admin_Bar_Styling_in_Wordpress_Theme_for_abs-HHR
 * @see http://codecanyon.net/item/foobar-wordpress-notification-bars/411466
 */
#add_action('admin_bar_init', 'my_admin_bar_init');
function my_admin_bar_init() {
        remove_action('wp_head', '_admin_bar_bump_cb');

        if (is_user_logged_in()) {
            add_action('wp_head', function() {
                echo '
                <style type="text/css" media="screen">
                    html { margin-top: 32px; }
                    * html body { margin-top: 32px; }
                        @media screen and ( max-width: 782px ) {
                        html { margin-top: 46px; }
                        * html body { margin-top: 46px; }
                    }
                </style>';
            }   
        );  
    }   
}





