<?php
/**
 * External Libraries & Plugins Fixes
 *
 *     >------------------>
 *
 *     1 Vendor Cleanup & Fixing
 *
 *         1.1 Disable Plugins' Dashbord Widgets            (#)
 *
 *     2 Browser fixes
 *
 *         2.1 Chrome Admin Menu fix                        ( )
 *
 *     <------------------<
 */


/**
 * 1 VENDOR CLEANUP & FIXING
 * ************************************************************
 */

/**
 * 1.1 DISABLE DASHBOARD WIDGETS
 *
 * Uncomment the ones you want to remove
 */

# add_action( 'admin_menu', 'medula_disable_vendor_dashboard_widgets' );

function medula_disable_vendor_dashboard_widgets() {

    # remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );           // Yoast's SEO
    # remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' );      // WPML
    # remove_meta_box( 'blc_dashboard_widget', 'dashboard', 'normal' );      // Broken Link Checker
}


/**
 * 2 BROWSERS FIXES
 * ************************************************************
 */

/**
 * 2.1 CHROME ADMIN MENU FIX
 *
 * Description: Quick fix for the Chrome 45 admin menu display glitches
 * Author: Steve Jones for The Space Between / Samuel Wood / Otto42
 * Author URI: http://the--space--between.com
 * Version: 2.1.0
 */

add_action('admin_enqueue_scripts', 'medula_chromefix_inline_css');

function medula_chromefix_inline_css() {
    wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
}

