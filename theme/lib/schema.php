<?php
/**
 * Schema Template (TODO)
 *
 * Functions for outputting schema.org html tags
 *
 */

function medula_schema_tag() {

	$schema = 'http://schema.org/';

	// Is single post
	if( is_single() ) {
		$type = "Article";
	}
	// Contact form page ID
	else if( is_page(1) )  	{
		$type = 'ContactPage';
	}
	// Is author page
	elseif( is_author() ) {
		$type = 'ProfilePage';
	}
	// Is search results page
	elseif( is_search() ) {
		$type = 'SearchResultsPage';
	}
	// Is of movie post type
	elseif(is_singular('movies')) {
		$type = 'Movie';
	}
	// Is of book post type
	elseif(is_singular('books')) {
		$type = 'Book';
	}
	else {
		$type = 'WebPage';
	}

	echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

