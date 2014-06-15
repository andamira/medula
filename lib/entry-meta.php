<?php
/*
 * Functions outputting ENTRY META fields
 *
 * INDEX:
 * 		DateTime
 * 		Author
 *
 * 		Byline
 * 		Categories + custom
 * 		Tags + custom
 *
 * 		Entry Edit Post
 *
 * Feel free to modify them in any way you like. For example:
 * You could add a parameter to the author function to choose
 * wether the link points to the author's url or WP page,
 * or you could change the Edit This text for a pencil icon.
 */


/*
 * Returns the entry author
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

/*
 * Returns the entry datetime
 */
function osea_get_entry_meta_date() {
	return( '<time class="entry-date updated" datetime="' . get_the_time('Y-m-dTH:i:sO') . '" itemprop="datePublished" pubdate>' . get_the_time(get_option('date_format')) . '</time>' );
}


/*
 * Prints the byline
 */
function osea_entry_meta_byline() {

	$byline  = '<span class="entry-byline byline">';

	$byline .= sprintf(__( 'Posted %1$s by %2$s', 'osea-theme' ), osea_get_entry_meta_date(), osea_get_entry_meta_author( 'index' ) );

	$byline .= '</span>';

	echo $byline;
}



/*
 * Prints the categories
 */
function osea_entry_meta_categories( $custom = false ) {

	$categories  = '<span class="entry-categories">';

	// title
	$categories .= '<span class="entry-categories-title">' . __('Filed under ', 'osea-theme' ) . '</span>';

	$categories .= '<span class="categories">';

	if ( $custom ) {
		// custom categories
		$categories .= get_the_term_list( $post->ID, $custom, ' ', ', ', '' );

	} else {
		// normal categories
		$categories .= get_the_category_list(', ');
	} 

	$categories .= '</span></span>';

	echo $categories;
}


/*
 * Prints the tags
 */
function osea_entry_meta_tags( $custom = false) {

	$tags_title = '<span class="entry-tags-title">' . __( 'Tags: ', 'osea-theme' ) . '</span>';

	$tags  = '<span class="entry-tags">';

	$tags .= '<span class="tags">' . get_the_tag_list( $tags_title, ', ' ) . '</span>';

	$tags .= '</span>';

	echo $tags;
}



/*
 * Prints the Edit Post Link
 */
function osea_entry_edit_post( $edit_text = null ) {
	$edit = '<span class="entry-edit-link"><a href="' . get_edit_post_link() . '">';

	if ( ! $edit_text ) {
		$edit_text = 'Edit This';
	}
	$edit .= __( $edit_text, 'osea-theme' );

	$edit .= '</a></span>';

	echo $edit;
}





?>
