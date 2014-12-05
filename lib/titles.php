<?php
/*
 * Titles template
 *
 *		1 Entry Title
 */


/*
 * 1 ENTRY TITLE
 * ************************************************************
 *
 * Prints entry title
 *
 * @param string $htag		Heading tag: h[1-6]
 * @param bool   $link		Display a link if true
 * @param bool   $headline	Add headline microdata if true
 */
function osea_entry_title( $htag, $with_link = false, $headline = false ) {

	if ( !in_array( $htag, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) ) ) {
		$htag = 'h1'; // value by default if none provided or wrong value
	}

	$title  = "<$htag ". 'class="entry-title"';

	if ( $with_link ) {
		$title .= '><a href="' . get_the_permalink() . '" rel="bookmark" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_title() . '</a>';
	} else {
		// NOTE: if no link, assumes it is headline
		$title .= ' itemprop="headline">' . get_the_title();
	}

	// Shows Edit Post Link ( defined in /lib/edit-post.php )
	$title .= osea_edit_post_link( false );

	$title .= "</$htag>";

	echo $title;
}


