<?php
/**
 * Shortcodes Template File
 *
 * Here you can write your own shortcodes. You can
 * copy the example as a model, or use a {@link http://generatewp.com/shortcodes/ generator}
 *
 * @link http://www.webdesignerdepot.com/2013/06/how-to-create-your-own-wordpress-shortcodes/
 */


/**
 * Shortcode Example
 *
 * Creates a div with any number of additional classes
 *
 * Usage: [medula-shortcode class="example"]
 *
 */

function medula_shortcode_example( $atts
	// Comment the next line for a self-enclosing shortcode
	, $content = null
	) {
	
	// List of attributes with either their default value, or null
	extract( shortcode_atts(
		array(
			'class' => null,
		), $atts )
	);

	$out = '<div class="medula_shortcode " ' . $class . '">';

	$out .= do_shortcode($content); // render shortcodes in content
	// $out .= $content; // do not render shortcodes

	$out .= '</div>';
	return $out;
}
add_shortcode( 'medula-shortcode', 'medula_shortcode_example' );



