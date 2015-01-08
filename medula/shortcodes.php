<?php
/**
 * Shortcodes Template File
 *
 * Here you can write your own shortcodes. You can
 * copy the example as a model, or use a generator like:
 * @see http://generatewp.com/shortcodes/
 *
 * Recommended reading:
 * @see http://www.webdesignerdepot.com/2013/06/how-to-create-your-own-wordpress-shortcodes/
 *
 */



/**
 * Osea Example shortcode
 *
 * Creates a div with any number of additional classes
 *
 * Usage: [osea-shortcode class="example"]
 * 
 */

 function osea_shortcode_example( $atts
		// Comment the next line for a self-enclosing shortcode
		, $content = null  
		) { 
	
	// List of attributes with either their default value, or null
    extract( shortcode_atts(
        array(
            'class' => null,
        ), $atts )
    );

    $out = '<div class="osea_shortcode " ' . $class . '">';
    $out .= $content;
    $out .= '</div>';
    return $out;
}
add_shortcode( 'osea-shortcode', 'osea_shortcode_example' );




