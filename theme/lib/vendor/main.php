<?php
/**
 * External Libraries & Plugins Templates
 *
 *     >------------------>
 *
 *     1 Override WordPress Templates
 *
 *     2 Specific Plugins
 *
 *         2.1 WPML                                         (#)
 *         2.2 Toolset                                      (#)
 *         2.3 WooCommerce                                  (#)
 *
 *     3 General Cleanup & Fixes                            ( )
 *
 *     4 Downloaded Libraries
 *
 *     <------------------<
 */


/**
 * 1 OVERRIDE WORDPRESS TEMPLATES
 * ************************************************************
 *
 */

function medula_template_override($layout = '') {

 	// NOTE: Currently only Toolset Layouts is officially supported.
	// In order to use it you must enable it below, in section 2.2,
	// and change the grid in /src/sass/deps/_frontend.scss
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
 * 3 CLEANUP & FIXES
 *
 * Fix misc. problems with some browsers libraries & plugins
 * and perform some cleaning for widgets, and other elements
 * ************************************************************
 */

include_once( 'vendor/clean-fix.php' );


/**
 * 4 Downloaded Libraries
 * ************************************************************
 *
 * Here you could include third party php libraries
 */

# include_once( 'vendor/example/example.php' );


