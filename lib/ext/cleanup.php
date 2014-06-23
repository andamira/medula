<?php
/*
 * This is the
 *
 *
 * At the end of this file you can write your
 * own custom functions.
 *
 *
 * Author: andamira
 * URL: htp://andamira.net/osea/
 *
 */


// TODO: include list of activations at the top:


// Minify HTML output

// Disable WPML CSS & JS




/*
 * DEFINITIONS
 *
 */


/*
 * FILTER HTML OUTPUT
 *
 * Source: http://stackoverflow.com/a/17472755
 *
 * TODO:
 * In WordPress 4.0 https://core.trac.wordpress.org/changeset/28708
 *
 * It would be better if it could be (de)activated from functions.php
 */


function callback($buffer) {
    // option 1 ( http://wordpress.org/support/topic/how-do-i-strip-out-all-whitespace-via-a-filter )
    //buffer = str_replace( array( "\n", "\t", '  ' ), '', $buffer );

    // option 2 ( http://stackoverflow.com/a/6225706
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
function buffer_start() { ob_start("callback"); }
function buffer_end() { ob_end_flush(); }
add_action('wp_head', 'buffer_start');
add_action('wp_footer', 'buffer_end');


/*
 * WPML MULTILINGUAL
 *
 * Source: http://wpml.org/documentation/support/wpml-coding-api
 */
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);





?>
