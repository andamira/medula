<?php
/**
 * EXTERNAL LIBRARIES & PLUGINS TEMPLATES
 *
 *     1 EXT. LIBRARY LOADING
 *
 *     2 EXT. FIXES
 *
 *     3 EXT. CLEANUP
 *
 *     4 SPECIFIC PLUGINS
 *
 *         4.1 WPML
 *         4.2 WP-TYPES
 *         4.3 WOOCOMMERCE
 */

/**
 * 1 Load external libraries
 * ************************************************************
 */
# include_once( '/../vendor/example/example.php' ); // TODO


/**
 * 2 Fix problems with external libraries & plugins
 * ************************************************************
 */
# include_once( 'vendor/fixes.php' );


/**
 * 3 Cleans & minifies code of external libraries, plugins, etc.
 * ************************************************************
 */
# include_once( 'vendor/cleanup.php' );


/**
 * 4 SPECIFIC PLUGINS SUPPORT
 * ************************************************************
 */

/**
 * 4.1 WPML
 *
 * @link http://wpml.org/
 */
# include_once( 'vendor/wpml.php' );         // < disabled by default

/**
 * 4.2 WP-TYPES
 *
 * @link http://wp-types.org/
 */
# include_once( 'vendor/wp-types.php' );         // < disabled by default

/**
 * 4.3 WOOCOMMERCE
 *
 * @link http://www.woothemes.com/woocommerce/
 */
# include_once( 'vendor/woocommerce.php' );  // < disabled by default



