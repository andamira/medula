<?php
/**
 * Functions outputting ENTRY META fields
 *
 *     1 DateTime
 *
 *     2 Author
 *
 *     3 Byline
 *
 *     4 Terms: taxonomies, Categories, tags
 *
 *     5 Entry Edit Post
 *
 * Feel free to modify them in any way you like. For example:
 * You could add a parameter to the author function to choose
 * wether the link points to the author's url or WP page,
 * or you could change the Edit This text for a pencil icon.
 */


/**
 * 1 Returns the entry datetime
 * ************************************************************
 */
function medula_get_entry_meta_date() {
	return( '<time class="entry-date updated" datetime="' . get_the_time( 'Y-m-dTH:i:sO' ) . '" itemprop="datePublished" pubdate>' . get_the_time( get_option( 'date_format' ) ) . '</time>' );
}


/**
 * 2 Returns the entry author
 * ************************************************************
 *
 * @link http://codex.wordpress.org/Function_Reference/get_the_author_meta
 */
function medula_get_entry_meta_author() {
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
 * ************************************************************
 */
function medula_entry_meta_byline() {
	$byline  = '<span class="entry-byline byline">';
	$byline .= sprintf(__( 'Posted %1$s by %2$s', 'medula-theme' ), medula_get_entry_meta_date(), medula_get_entry_meta_author( 'index' ) );
	$byline .= '</span>';

	echo $byline;
}


/**
 * 4 Prints the terms (taxonomies, categories, tags... )
 * ************************************************************
 */
function medula_entry_meta_terms( $custom, $class, $label) {

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
function medula_entry_meta_categories( $custom = 'category' ) {
	medula_entry_meta_terms( $custom, 'categories', __( 'Filed under', 'medula-theme' ) );
}
// convenience function for tags
function medula_entry_meta_tags( $custom = 'post_tag' ) {
	medula_entry_meta_terms( $custom, 'tags', __( 'Tags:', 'medula-theme' ) );
}


/**
 * 5 Returns the Edit Link (post, comment, etc.)
 * ************************************************************
 *
 * @link http://codex.wordpress.org/Function_Reference/current_user_can
 * @link http://docs.appthemes.com/tutorials/wordpress-check-user-role-function/
 */
function medula_edit_link( $link, $echo = true ) {

	// Check if user has permission to see the edit link
	$user = wp_get_current_user();
	$allowed_roles = array('editor', 'administrator', 'author');
	if( ! array_intersect($allowed_roles, $user->roles ) ) { return; }

	// More possibilities:
	//if ( ! current_user_can('edit_pages') ) { return; }

	$edit  = '<span class="edit-link"><a href="' . $link . '"';
	$edit .= ' title="' . __( 'Edit This', 'medula-theme' ) . '">';
	$edit .= '<i class="dashicons dashicons-edit"></i>';
	$edit .= '</a></span>';

	if ( $echo ) {
		echo $edit;
	} else {
		return $edit;
	}
}
// convenience function for posts
function medula_edit_post_link( $echo = true ) {
	return medula_edit_link( get_edit_post_link(), $echo );
}
// convenience function for comments
function medula_edit_comment_link( $echo = true ) {
	return medula_edit_link( get_edit_comment_link(), $echo );
}


