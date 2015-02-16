<?php
/**
 * The comments page
 *
 * @link http://codex.wordpress.org/Template_Tags/wp_list_comments
 */

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

	if ( have_comments() ) : ?>

		<section class="comments-list">

		<header>
			<h2 id="comments-title" ><?php comments_number( __( '<span>No</span> Comments', 'medula-theme' ), __( '<span>One</span> Comment', 'medula-theme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'medula-theme' ) );?></h2>
		</header>

		<section class="comments-list">

		<?php
			if ( function_exists('medula_comments_layout') ) {
				$cb = 'medula_comments_layout';
				$cb_end = 'medula_comments_layout_end';
			} else {
				$cb = '';
				$cv_end = '';
			}

			wp_list_comments( array(
				'walker'            => null,
				'max_depth'         => '',
				'style'             => 'div',
				'callback'          => $cb,
				'end-callback'      => $cb_end,
				'type'              => 'comment',
				'reply_text'        => __( 'Reply', 'medula-theme' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 40,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'short_ping'        => true,
				'echo'              => true
			) );
		?>
		</section>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="comments-nav" role="navigation">
			<div class="comments-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'medula-theme' ) ); ?></div>
			<div class="comments-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'medula-theme' ) ); ?></div>
			</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'medula-theme' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>
