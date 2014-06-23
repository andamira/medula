<?php
/**
 * Thumbnails template
 *
 *		1 Theme Support & default size
 *		2 Thumbnail Sizes
 */


/**
 * 1 THEME SUPPORT & DEFAULT THUMB SIZE
 * ************************************************************
 *
 */
add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size(125, 125, true);


/*
 * 2 CUSTOM THUMBNAIL SIZES
 * ************************************************************
 */

#add_image_size( 'osea-600', 600, 150, true );
#add_image_size( 'osea-300', 300, 100, true );




