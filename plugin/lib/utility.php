<?php
/*
 * Helper functions file
 *
 *     1 hex2rgba : Convert HEXDEC color string to rgb(a) string
 *
 *     2 encode_email : To prevent Spam
 *
 *     3 get_image_id_by_link : When you need an image Id and you just have the link
 */


/**
 * 1 CONVERT HEXDEC COLOR STRING TO RGB(A) STRING
 *
 * @link http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
 */
function medulap_hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	// Return default if no color provided
	if(empty($color))
		return $default;

		// Sanitize $color if "#" is provided
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return $default;
		}

		//Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);

		//Check if opacity is set(rgba or rgb)
		if($opacity){
			if(abs($opacity) > 1)
				$opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
		} else {
			$output = 'rgb('.implode(",",$rgb).')';
		}

		//Return rgb(a) color string
		return $output;
}


/**
 * 2 ENCODE EMAIL
 *
 * @link http://davidwalsh.name/php-email-encode-prevent-spam
 */

function medulap_encode_email($e) {
	$output = ""; 
	for ($i = 0; $i < strlen($e); $i++) { $output .= '&#'.ord($e[$i]).';'; }
	return $output;
}

/**
 * 3 GET ATTACHMENT ID BY LINK
 *
 * @link https://philipnewcomer.net/2012/11/get-the-attachment-id-from-an-image-url-in-wordpress/
 */

function medulap_get_attachment_id_from_url( $attachment_url = '' ) {
	global $wpdb;
	$attachment_id = false;

	// If there is no url, return.
	if ( '' == $attachment_url ) {
		return;
	}

	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();

	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	}

	return $attachment_id;
}

