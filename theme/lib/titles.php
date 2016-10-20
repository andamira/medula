<?php
/*
 * Titles Library Template
 *
 *     >------------------>
 *
 *     1 Entry Title
 *
 *     2 Site Title
 *
 *         2.1 pre_get_document_title
 *         2.2 document_title_separator
 *         2.3 document_title_parts
 *
 *     <------------------<
 */


/*
 * 1 ENTRY TITLE
 * ************************************************************
 *
 * Prints entry title
 *
 * NOTE: If you want to print the title and surround it yourself
 * the way you want you can do it like this:
 * 
 *   <h1 class="entry-title">
 *     <?php the_title(); echo medula_edit_post_link( false ); ?>
 *   </h1>
 *
 * @param string $htag		Heading tag: h[1-6]
 * @param bool   $link		Display a link if true
 * @param bool   $headline	Add headline microdata if true
 */

function medula_entry_title( $htag, $with_link = false, $headline = false ) {

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

	/**
	 * Shows Edit Post Link 
	 *
	 * @see /theme/lib/entry-meta.php
	 */

	$title .= medula_edit_post_link( false );

	$title .= "</$htag>";

	echo $title;
}


/*
 * 2 SITE TITLE
 * ************************************************************
 *
 * Customize the site title (HTML Document title).
 *
 * NOTE: You could copy any of these filters into some theme templates,
 * in order to customize the title separator in some pages, for example.
 *
 * @link https://make.wordpress.org/core/2015/10/20/document-title-in-4-4/
 */

/*
 *  2.1 pre_get_document_title
 *
 *  Short-circuits wp_get_document_title() if it returns anything other than an empty value.
 */

# apply_filters( 'pre_get_document_title', 'New Title' );

/*
 * 2.2 document_title_separator
 *
 * Filters the separator between title parts.
 */

# apply_filters( 'document_title_separator', '|' );

/*
 * 2.3 document_title_parts
 *
 * Filters the parts that make up the document title, passed in an associative array.
 *
 * @link https://developer.wordpress.org/reference/hooks/document_title_parts/
 */

/*
$medula_title_parts = array(
	title => 'New Title',
	# page => '',
	# tagline => '',
	# site => ''
);
apply_filters( 'document_title_parts', $medula_title_parts );
/**/

