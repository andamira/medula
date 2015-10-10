<?php
/**
 * EXTERNAL LIBRARIES & PLUGINS TEMPLATES
 *
 *     1 SPECIFIC PLUGINS
 *
 *         1.1 WPML
 *         1.2 TOOLSET
 *         1.3 WOOCOMMERCE
 *
 *     2 EXT. FIXES
 *
 *     3 DOWNLOADED LIBRARIES
 */


/**
 * 2 SPECIFIC PLUGINS SUPPORT
 * ************************************************************
 */

/**
 * 1.1 WPML
 *
 * @link http://wpml.org/
 */
# include_once( 'vendor/wpml.php' );

/**
 * 1.2 TOOLSET
 *
 * @link http://wp-types.org/ Toolset
 */
# include_once( 'vendor/toolset.php' );

/**
 * 1.3 WOOCOMMERCE
 *
 * @link http://www.woothemes.com/woocommerce/
 */
# include_once( 'vendor/woocommerce.php' );


/**
 * 2 Fix misc. problems with some browsers libraries & plugins
 * ************************************************************
 */
include_once( 'vendor/fixes.php' );


/**
 * 3 Downloaded Libraries
 * ************************************************************
 */
# include_once( '../vendor/example/example.php' ); // TODO


