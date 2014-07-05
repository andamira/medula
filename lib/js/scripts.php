<?php
/**
 * Wrapper for minifiying scripts.js
 *
 * TODO: 
 * @see https://github.com/andamira/osea/issues/14
 */

require 'JShrink/Minifier.php';


if ( filemtime( 'scripts.js') < filemtime( 'scripts.min.js' ) ) {
	//readfile( 'scripts.min.js' );
	echo file_get_contents( 'scripts.min.js' );
} else {
	$output = \JShrink\Minifier::minify( file_get_contents( 'scripts.js' ) );
	//$output = file_get_contents( 'scripts.js' );
	file_put_contents( 'scripts.min.js', $output );
	echo $output;
}

?>
