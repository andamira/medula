<?php
/**
 * Page Links Library Template
 *
 * This is used in case you have posts that are set to break into
 * multiple pages. You can remove this if you don't plan on doing that.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_link_pages
 * @link http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
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

