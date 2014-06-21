<?php
/**
 * Functions outputting ENTRY META fields
 *
 * 		1 DateTime
 * 		2 Author
 *
 * 		3 Byline
 * 		4 Terms: taxonomies, Categories, tags
 *
 * 		5 Entry Edit Post
 *
 * Feel free to modify them in any way you like. For example:
 * You could add a parameter to the author function to choose
 * wether the link points to the author's url or WP page,
 * or you could change the Edit This text for a pencil icon.
 */


/**
 * 1 Returns the entry datetime
 */
function osea_get_entry_meta_date() {
	return( '<time class="entry-date updated" datetime="' . get_the_time('Y-m-dTH:i:sO') . '" itemprop="datePublished" pubdate>' . get_the_time(get_option('date_format')) . '</time>' );
}


/**
 * 2 Returns the entry author
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/get_the_author_meta
 */
function osea_get_entry_meta_author() {
	$author  = '<address class="entry-author vcard">';

	// Author link ( set condition to false to disable link )
	if ( true ) {
		$author .= '<a href="';

		// You can choose to link either to author's wordpress user page
		$author .= get_author_posts_url( get_the_author_meta( "ID" ) ) . '">';
		// or to author's website
		//$author .= get_the_author_meta( "user_url" ) . '">';

		$author .= get_the_author_meta( 'display_name' );
		$author .= '</a>';

	} else {
		$author .= get_the_author_meta( 'display_name' );
	}
	$author .= '</address>';

	return $author;
}


/**
 * 3 Prints the byline
 */
function osea_entry_meta_byline() {
	$byline  = '<span class="entry-byline byline">';
	$byline .= sprintf(__( 'Posted %1$s by %2$s', 'osea-theme' ), osea_get_entry_meta_date(), osea_get_entry_meta_author( 'index' ) );
	$byline .= '</span>';

	echo $byline;
}



/**
 * 4 Prints the terms (taxonomies, categories, tags... )
 */
function osea_entry_meta_terms( $custom, $class, $label) {

	$tags  = '<span class="entry-' . $class . '">';
	$title = '<span class="entry-' . $class . '-title">' . $label . '</span>';

	// Error catching
	if ( is_wp_error(
			$term_list = get_the_term_list( 0, $custom, $title . '<span class="' . $class . '">', ', ', '</span>' ) )
		) {
		echo '<span class="alert-error">' . $term_list->get_error_message() . '</span>';
	} else {
		$tags.= $term_list;
	}

	$tags .= '</span>';

	echo $tags;
}
// convenience function for categories
function osea_entry_meta_categories( $custom = 'category' ) {
	osea_entry_meta_terms( $custom, 'categories', __( 'Filed under', 'osea-theme' ) );
}
// convenience function for tags
function osea_entry_meta_tags( $custom = 'post_tag' ) {
	osea_entry_meta_terms( $custom, 'tags', __('Tags:', 'osea-theme' ) );
}


/**
 * 5 Returns the Edit Link (post, comment, etc.)
 */
function osea_edit_link( $link, $echo = true ) {
	$edit  = '<span class="edit-link"><a href="' . $link . '"';
	$edit .= ' title="' . __('Edit This', 'osea-theme') . '">';
	$edit .= '<i class="dashicons dashicons-edit"></i>';
	$edit .= '</a></span>';

	if ( $echo ) {
		echo $edit;
	} else {
		return $edit;
	}
}
// convenience function for posts
function osea_edit_post_link( $echo = true) {
	osea_edit_link( get_edit_post_link() , $echo );
}
// convenience function for comments
function osea_edit_comment_link( $echo = true ) {
	osea_edit_link( get_edit_comment_link() , $echo );
}



