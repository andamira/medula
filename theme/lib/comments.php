<?php
/**
 * Comments template
 *
 *     1 Comments Count Display Function
 *
 *     2 Custom Comment Layout
 *
 */


/**
 * 1 COMMENTS COUNT
 * ************************************************************
 *
 * @param bool $link Include a link to #comments-title if comments != 0
 *
 * @link http://codex.wordpress.org/Function_Reference/comments_number
 * @link http://codex.wordpress.org/Function_Reference/_n
 */
function medula_comments_count( $link = false ) {

	$com_num = get_comments_number();
	# $com_num = get_comments_number_text();

	$cc  = '<span class="entry-comments-count">';

		// make it a link if requested
		if ( $link && $com_num ) {
			$cc .= '<a href="' . get_the_permalink() . '#comments-title" title="' . __( 'Go to comments', 'medula' ) . '">';
		}

			$cc .= comments_number(
				__( 'No comments', 'medula' ),
				__( 'One comment', 'medula' ),
				sprintf( __( '% comments', 'medula' ), $com_num() )
			);

		if ( $link && $com_num ) {
			$cc .= '</a>';
		}

	$cc .= '</span>';

	echo $cc;
}


/**
 * 2 CUSTOM COMMENT LAYOUT
 * ************************************************************
 *
 * @link http://www.whatwg.org/specs/web-apps/current-work/multipage/sections.html#the-article-element
 *
 */
function medula_comments_layout( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

	<article id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>

		  <header class="comment-author">
			<?php

			/*
			 * 2.1 Gravatar Call
			 *
			 * @link https://en.gravatar.com/site/implement/images/
			 */

			echo get_avatar($comment, $size='42', $default='' );

			/*
			 * 2.2 Custom gravatar call
			 *
			 * This is an alternative responsive optimized comment image loader.
			 * It uses the data-attribute to display comment gravatars on larger screens only.
			 *
			 * You'll have to enable it also in /src/js/main.js
			 */

			# echo '<img data-gravatar="' . medula_get_protocol() . 'www.gravatar.com/avatar/' . md5( get_comment_author_email() ) . '?r=pg&s=40" class="load-gravatar avatar photo" height="40" width="40" src="' . get_template_directory_uri() . '/res/img/nothing.gif" />';
			?>

			<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'medula' ), get_comment_author_link(), medula_edit_comment_link() ) ?>
			<time datetime="<?php echo comment_time('Y-m-dTH:i:sO'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time( get_option( 'date_format' ) ); ?> </a></time>

		</header>

		<?php if ($comment->comment_approved == '0') : ?>
			<div class="alert alert-info">
				<p><?php _e( 'Your comment is awaiting moderation.', 'medula' ) ?></p>
			</div>
		<?php endif; ?>

		<section class="comment-content">
			<?php comment_text() ?>
		</section>

		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
<?php

}

function medula_comments_layout_end( $comment, $args, $depth ) {
	echo '</article>';
}


