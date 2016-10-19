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

# include_once( 'wpml.php' );

/**
 * 1.2 WOOCOMMERCE
 *
 * @link http://www.woothemes.com/woocommerce/
 */

# include_once( 'woocommerce.php' );


/**
 * 2 CLEANUP & FIXES
 *
 * Fix misc. problems with some browsers libraries & plugins
 * and perform some cleaning for widgets, and other elements
 * ************************************************************
 */

include_once( 'clean-fix.php' );


/**
 * 3 Downloaded Libraries
 * ************************************************************
 *
 * Here you could include third party php libraries
 */

# include_once( 'example/example.php' );

