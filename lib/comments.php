<?php
/**
 * Comments template
 *
 *
 * 		1 Comments Count Display Function
 * 		2 Custom Comment Layout
 */


/**
 * 1 COMMENTS COUNT
 * ************************************************************
 *
 * @param bool $link 	Include a link to #comments-title if comments != 0
 *
 * @link http://codex.wordpress.org/Function_Reference/comments_number
 * @link http://codex.wordpress.org/Function_Reference/_n
 */
function osea_comments_count( $link = false ) {

	$cc  = '<span class="entry-comments-count">';

	$com_num = get_comments_number();
	#$com_num = get_comments_number_text(); // (since 4.0)

	if ( $link && $com_num ) {
		$cc .= '<a href="' . get_the_permalink() . '#comments-title" title="' . __( 'Go to comments', 'osea-theme' ) . '">';
	}

	if ( ! $com_num ) {
		$cc .= __( '<span>No</span> Comments', 'osea-theme' );
	} else {
		$cc .= sprintf ( _n( '<span>%s</span> Comment', '<span>%s</span> Comments', $com_num, 'osea-theme' ), $com_num );
	}

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
function osea_comments_layout( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

	<article id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>

		  <header class="comment-author vcard">
			<?php
			/*
			 * Custom gravatar call
			 *
			 * this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display
			 * comment gravatars on larger screens only. What this means is that on larger posts, mobile sites
			 * don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd
			 * like to change it back, just replace it with the regular wordpress gravatar call:
			 * 
			 * echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			*/
			$bgauthemail = get_comment_author_email();
			?>
			<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/lib/img/nothing.gif" />

			<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'osea-theme' ), get_comment_author_link(), osea_edit_comment_link() ) ?>
			<time datetime="<?php echo comment_time('Y-m-dTH:i:sO'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time( get_option( 'date_format' ) ); ?> </a></time>

		</header>

		<?php if ($comment->comment_approved == '0') : ?>
			<div class="alert alert-info">
				<p><?php _e( 'Your comment is awaiting moderation.', 'osea-theme' ) ?></p>
			</div>
		<?php endif; ?>

		<section class="comment-content">
			<?php comment_text() ?>
		</section>

		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
<?php

}

function osea_comments_layout_end( $comment, $args, $depth ) {
	echo '</article>';
}



