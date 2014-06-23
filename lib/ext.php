<?php
/**
 * EXTERNAL LIBRARIES & PLUGINS TEMPLATES
 *
 *
 *		1 EXT. LIBRARY LOADING
 *		2 EXT. FIXES
 *		3 EXT. CLEANUP
 *
 * 		4 SPECIFIC PLUGINS
 * 			4.1 WPML
 *			4.2 WOOCOMMERCE
 */

/**
 *  1 Load external libraries
 */
include_once( 'ext/libs.php' );


/**
 * 2 Fix problems with external libraries & plugins
 */
include_once( 'ext/fixes.php' );


/**
 * 3 Cleans & minifies code of
 * of external libraries, plugins, etc.
 */
include_once( 'ext/cleanup.php' );


/** 
 * 4 SPECIFIC PLUGINS SUPPORT
 */

/**
 * 4.1 WPML
 *
 * @see http://wpml.org/
 */
#include_once( 'ext/wpml.php' );			// < disabled by default

/**
 * 4.2 WOOCOMMERCE
 *
 * @see http://www.woothemes.com/woocommerce/
 */
#include_once( 'ext/woocommerce.php' );	// < disabled by default





