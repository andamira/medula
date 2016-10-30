<?php
/**
 * External Libraries & Plugins Templates
 *
 *     >------------------>
 *
 *     1 Specific Plugins
 *
 *         1.1 WPML                                         (#)
 *         1.4 WooCommerce                                  (#)
 *
 *     2 General Cleanup & Fixes                            ( )
 *
 *     3 Downloaded Libraries
 *
 *         3.1 Javascript
 *         3.2 PHP
 *
 *     <------------------<
 */


/**
 * 1 SPECIFIC PLUGINS THEME SUPPORT
 * ************************************************************
 */

/**
 * 1.1 WPML
 *
 * @link http://wpml.org/
 */

# include_once get_theme_file_path( 'wp_plugins/wpml.php' );

/**
 * 1.2 WOOCOMMERCE
 *
 * @link http://www.woothemes.com/woocommerce/
 */

# include_once get_theme_file_path( 'wp_plugins/woocommerce.php' );


/**
 * 2 CLEANUP & FIXES
 *
 * Fix misc. problems with some browsers libraries & plugins
 * and perform some cleaning for widgets, and other elements
 * ************************************************************
 */

include_once get_theme_file_path( 'clean-fix.php' );


/**
 * 3 Downloaded Libraries
 * ************************************************************
 *
 * Here you can include third party javascript or php libraries
 *
 * For more information see /gulpfile.js sections 2.3, 2.4 & 2.5
 */

/**
 * 3.1 Javascript
 */

# wp_register_script( 'thatvendor-js', . medula_get_theme_resources_uri('js/vendor/thatvendor.js'), array(), '', true );

/**
 * 3.2 PHP
 */

# include_once get_theme_file_path( 'example/example.php' );

