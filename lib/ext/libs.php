<?php
/**
 * External Libraries Template
 *
 */


/**
 * ENQUEUE EXTRA LIBRARIES & STYLES
 *
 * @see:source http://stackoverflow.com/a/19263523 
 */
function extra_libraries_styles() {

	/**
	 * OPTIONS
	 */

	// Here choose which libraries to load
	$load_jquery =		false;  // latest jquery
	//
	$load_cycle2 =		false;  // versatile sliders
	$load_qtip2 =		false;  // advanced bubble tips system
	$load_dynatable =	false;  // powerful tables

	// Set this to true to usea  minified version of the scripts
	$_PRODUCTION_ = false;

	if ($_PRODUCTION_) { $MIN = ".min"; } else { $MIN = ""; }
	$EXT_DIR = get_stylesheet_directory_uri() . '/lib/ext/';


	/**
	 * LIBRARIES
	 */

	// JQUERY ( Google CDN )
	if ( $load_jquery ) { 
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js", false, null );
		wp_enqueue_script( 'jquery' );
	}

	// [SLIDER] JQUERY CYCLE2 ( http://jquery.malsup.com/cycle2/ ) ( https://github.com/malsup/cycle2 )
	if ( $load_cycle2 ) { 
		wp_register_script('cycle2_js', $EXT_DIR .'cycle2/jquery.cycle2'. $MIN .'.js', 'jquery' );
		wp_enqueue_script( 'cycle2_js');
	}   
	// [BUBBLE TIPS] JQUERY QTIP2 ( http://qtip2.com/ ) ( https://github.com/qTip2/qTip2  )
	if ( $load_qtip2 ) { 
		// there are more features available ( http://qtip2.com/download#builder-features )
		wp_register_script( 'qtip2_js', '//cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/basic/jquery.qtip'. $MIN .'.js', 'jquery' );
		wp_enqueue_script( 'qtip2_js');
		wp_register_style( 'qtip2_css', '//cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.0/basic/jquery.qtip'. $MIN .'.css' );
		wp_enqueue_style( 'qtip2_css');
	}   
	// [TABLES] DYNATABLE ( https://www.dynatable.com/ ) ( https://github.com/alfajango/jquery-dynatable )
	if ( $load_dynatable ) { 
		// This is a customized version of Dynatable for adding localization support
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

}
add_action( 'wp_enqueue_scripts', 'extra_libraries_styles' );



?>
