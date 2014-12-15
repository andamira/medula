<?php
/**
 * External Libraries Template
 *
 *		1 GLOBALS
 *		2 CHOOSE LIBRARIES
 *			2. Typography
 *			2. 
 *			2. Maps
 *			2.
 *		3 SETUP LIBRARIES
 */


function extra_libraries_styles () {

	/**
	 * 1 GLOBALS
	 */
	// Set this to true to use a minified version of the scripts
	$MINIFY_EXT_LIBS = false;
	$EXT_DIR = get_stylesheet_directory_uri() . '/lib/js/libs/';

	if ($MINIFY_EXT_LIBS) { $MIN = ".min"; } else { $MIN = ""; }


	/**
	 * 2 CHOOSE LIBRARIES TO LOAD
	 *
	 * Set to true the libraries you want to use
	 */

	// Latest jquery
	$load_jquery =		false;

	// Sliders
	$load_cycle2 =		false;

	// Bubble Tips
	$load_qtip2 =		false;

	// Tables
	$load_dynatable =	false;

	// MMenu (Mobile) Menu
	$load_mmenu =   true;

	// Typography TODO
	$load_lettering =	false;	// letteringjs.com


	/**
	 * 3 SETUP THE LIBRARIES
	 *
	 * @see:source http://stackoverflow.com/a/19263523 
	 */

	/**
	 * JQUERY
	 * Google CDN
	 */
	if ( $load_jquery ) { 
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js", false, null );
		wp_enqueue_script( 'jquery' );
	}

	/**
	 * JQUERY CYCLE2
	 * 
	 * SLIDER
	 * @see http://jquery.malsup.com/cycle2/ 
	 * @see https://github.com/malsup/cycle2
	 */
	if ( $load_cycle2 ) { 
		wp_register_script('cycle2_js', $EXT_DIR .'cycle2/jquery.cycle2'. $MIN .'.js', 'jquery' );
		wp_enqueue_script( 'cycle2_js');
	}   

	/**
	 * JQUERY QTIP2 
	 *
	 * BUBBLE TIPS
	 * @see http://qtip2.com/ 
	 * @see https://github.com/qTip2/qTip2
	 */
	if ( $load_qtip2 ) { 
		// there are more features available ( http://qtip2.com/download#builder-features )
		wp_register_script( 'qtip2_js', '//cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/basic/jquery.qtip'. $MIN .'.js', 'jquery' );
		wp_enqueue_script( 'qtip2_js');
		wp_register_style( 'qtip2_css', '//cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/basic/jquery.qtip'. $MIN .'.css' );
		wp_enqueue_style( 'qtip2_css');
	}

	/**
	 * DYNATABLE
	 *
	 * TABLES
	 * @see https://www.dynatable.com/
	 * @see https://github.com/alfajango/jquery-dynatable
	 */
	if ( $load_dynatable ) { 
		// This is a customized version of Dynatable that adds localization support
		wp_register_script('dynatable_js', $EXT_DIR .'dynatable/jquery.dynatable'. $MIN .'.js', 'jquery' ); // used http://jscompress.com/
		// localization
		wp_localize_script('dynatable_js', 'dynatable_txt', array(
			'search' => __('Search: ', 'dynatable_lib'),
			'show' => __('Show: ', 'dynatable_lib'),
			'prev' => __('Previous', 'dynatable_lib'),
			'next' => __('Next', 'dynatable_lib'),
			'pages' => __('Pages: ', 'dynatable_lib'),
			'showing' => __('Showing', 'dynatable_lib'),
			'recordsshown' => __('{recordsShown} of', 'dynatable_lib'),
			'pagebounds' => __('{pageLowerBound} to {pageUpperBound} of', 'dynatable_lib'),
			'filtered' => __('(filtered from {recordsTotal} total records)', 'dynatable_lib'),
			'process' => __('Processing...', 'dynatable_lib'),
			'records' => __('records', 'dynatable_lib'), // XXX possible bug, request independant Text variable if translating doesn't work
		));
		wp_enqueue_script( 'dynatable_js');
	}


	/** 
	 * MMENU
	 *
	 * OFF-CANVAS MENU
	 * @see http://mmenu.frebsite.nl/
	 */
	if ( $load_mmenu ) { 
		wp_register_script('mmenu_js', $EXT_DIR .'mmenu/jquery.mmenu.min.all.js', 'jquery' );
		wp_enqueue_script( 'mmenu_js');
		wp_register_style( 'mmenu_css', $EXT_DIR .'mmenu/jquery.mmenu.all.css' );
		wp_enqueue_style( 'mmenu_css');
	}

}
add_action( 'wp_enqueue_scripts', 'extra_libraries_styles' );


