<?php
/**
 * Thumbnails template
 *
 *		1 Theme Support & default size
 *		2 Remove default image sizes
 *		3 Thumbnail Sizes
 */


/**
 * 1 THEME SUPPORT & DEFAULT THUMB SIZE
 * ************************************************************
 *
 */
add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size(125, 125, true);


/**
 * 2 REMOVE DEFAULT IMAGE SIZES
 * ************************************************************
 */
#add_filter('image_size_names_choose', 'osea_remove_image_size');
function osea_remove_image_size( $sizes ) {
	unset( $sizes['thumbnail'] );
	unset( $sizes['medium'] );
	unset( $sizes['large'] );

	return $sizes;
}


/*
 * 3 CUSTOM THUMBNAIL SIZES
 * ************************************************************
 */

#add_image_size( 'small', 150, 150, true );
#add_image_size( 'medium', 300, 300, true );
#add_image_size( 'large', 1024, 1024, true );

#add_image_size( 'osea-600', 600, 150, true );
#add_image_size( 'osea-300', 300, 100, true );




