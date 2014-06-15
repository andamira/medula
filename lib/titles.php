<?php
/*
 * Titles template
 *
 */


/*
 * A better title
 *
 * Instead of filtering wp_title() we're gonna call this function directly
 *
 * Source:
 * http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
 */
function wp_title2( $title, $sep, $seplocation ) { 
	global $page, $paged;

	// Don't affect in feeds.
	if ( is_feed() ) return $title;

	// Add the blog's name
	if ( 'right' == $seplocation ) { 
	$title .= get_bloginfo( 'name' );
	} else {
	$title = get_bloginfo( 'name' ) . $title;
	}

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) ) { 
	$title .= " {$sep} {$site_description}";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) { 
	$title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
	}

	return $title;

}


?>
