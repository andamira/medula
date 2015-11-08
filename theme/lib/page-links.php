<?php
/**
 * Page Links Template
 *
 * This is used in case you have posts that are set to break into
 * multiple pages. You can remove this if you don't plan on doing that.
 *
 * Also, breaking content up into multiple pages is a horrible experience,
 * While there are SOME edge cases where this is useful, it's  mostly used
 * for people to get more ad views.
 *
 * @link http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
 * @link http://codex.wordpress.org/Function_Reference/wp_link_pages
 */

function medula_page_links() {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'medula' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'medula' ),
		'previouspagelink' => __( 'Previous page', 'medula' ),
		'pagelink'         => '%',
		'echo'             => 1
	));
}


