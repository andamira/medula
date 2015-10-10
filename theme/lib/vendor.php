<?php
/**
 * External Libraries & Plugins Templates
 *
 *     1 Templates Overriding
 *
 *     2 Specific Plugins
 *
 *         2.1 WPML
 *         2.2 Toolset
 *         2.3 WooCommerce
 *
 *     3 Misc. Fixes 
 *
 *     4 Downloaded Libraries
 */


/**
 * 1 TEMPLATES OVERRIDING
 * ************************************************************
 * Currently only Toolset Layouts is supported
 */
function medula_template_override($layout = '') {

 	// You must enable the Toolset suite in section 2.2
	//
	if ( function_exists('medula_toolset_layout') ) {
		return( medula_toolset_layout($layout) ); 

	} else {
		return(false);
	}
}


/**
 * 2 SPECIFIC PLUGINS THEME SUPPORT
 * ************************************************************
 */

/**
 * 2.1 WPML
 *
 * @link http://wpml.org/
 */
# include_once( 'vendor/wpml.php' );

/**
 * 2.2 TOOLSET
 *
 * @link http://wp-types.org/ Toolset
 */
# include_once( 'vendor/toolset.php' );

/**
 * 2.3 WOOCOMMERCE
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


