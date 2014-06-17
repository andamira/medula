<?php
/*
 * Titles template
 *
 *		1 Entry Title
 *
 *		2 A Better wp_title()
 */


/*
 * 1 ENTRY TITLE
 *
 * Prints entry title
 *
 * Arguments: the heading tag, wether to display a link or not
 */
function osea_entry_title( $htag, $with_link = false, $headline = false ) {

	if ( !in_array( $htag, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) ) ) {
		$htag = 'h1'; // value by default if none provided
	}

	$title  = "<$htag ". 'class="entry-title"';

	if ( $with_link ) {
		$title .= '><a href="' . get_the_permalink() . '" rel="bookmark" title="' . the_title_attribute('', '', false) . '">' . get_the_title() . '</a>';
	} else {
		// NOTE: if no link, assumes it is headline
		$title .= ' itemprop="headline">' . get_the_title();
	}

	// Shows Edit Post Link ( defined in /lib/edit-post.php )
	$title .= osea_entry_edit_post( false ); // echo = false

	$title .= "</$htag>";

	echo $title;
}



/*
 * 2 A BETTER wp_title()
 *
 * Instead of filtering wp_title() we create a new function,
 * in order to maintain the default one when needed. e.g.:
 * to retrieve the page-title on index.php.
 *
 * Source:
 * http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/wp_title
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



