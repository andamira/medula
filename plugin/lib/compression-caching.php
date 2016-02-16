<?php
/**
 * Basic Optimization Support
 *
 *     >------------------>
 *
 *     1 Filter HTML output                                (#)
 *
 *     <------------------<
 */


/**
 * 1 FILTER HTML OUTPUT
 *
 * Remove the whitespace from HTML between wp_head and wp_footer.
 *
 * @link http://stackoverflow.com/a/17472755
 * @link https://core.trac.wordpress.org/changeset/28708
 */

# define( 'medulap_FILTER_HTML' true );

if ( defined( 'medulap_FILTER_HTML' ) && medulap_FILTER_HTML ) {
	add_action('wp_head', 'medulap_optimize_html_buffer_start');
	add_action('wp_footer', 'medulap_optimize_html_buffer_end');
}

function medulap_optimize_html_callback( $buffer ) { 
    // option 1 ( http://wordpress.org/support/topic/how-do-i-strip-out-all-whitespace-via-a-filter )
    //buffer = str_replace( array( "\n", "\t", '  ' ), '', $buffer );

    // option 2 ( http://stackoverflow.com/a/6225706 )
    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );  
    $replace = array(
        '>',
        '<',
        '\\1'
    );  
    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}
function medulap_optimize_html_buffer_start() { ob_start("medulap_optimize_html_callback"); }
function medulap_optimize_html_buffer_end() { ob_end_flush(); }
