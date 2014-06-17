<?php
/*
 * PAGE LINKS
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/wp_link_pages
 */

function osea_page_links() {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'osea-theme' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'osea-theme' ),
		'previouspagelink' => __( 'Previous page', 'osea-theme' ),
		'pagelink'         => '%',
		'echo'             => 1
	));
}


