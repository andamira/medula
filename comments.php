<?php
/* 
 * The comments page
 *
*/

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

	if ( have_comments() ) : ?>

		<section class="comments-list">

		<header>
			<h2 id="comments-title" ><?php comments_number( __( '<span>No</span> Comments', 'osea-theme' ), __( '<span>One</span> Comment', 'osea-theme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'osea-theme' ) );?></h2>
		</header>

		<section class="comments-list">

		<?php
			if ( function_exists('osea_comments_layout') ) {
				$cb = 'osea_comments_layout';
				$cb_end = 'osea_comments_layout_end';
			} else {
				$cb = '';
				$cv_end = '';
			}

			// Codex: http://codex.wordpress.org/Template_Tags/wp_list_comments
			wp_list_comments( array(
				'walker'			=> null,
				'max_depth'			=> '',
				'style'				=> 'div',
				'callback'			=> $cb,
				'end-callback'		=> $cb_end,
				'type'              => 'comment',
				'reply_text'        => __( 'Reply', 'osea-theme' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'		=> 40,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'			=> 'html5',
				'short_ping'		=> true,
				'echo'				=> true
			) );
		?>
		</section>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav class="comments-nav" role="navigation">
      	<div class="comments-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'osea-theme' ) ); ?></div>
      	<div class="comments-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'osea-theme' ) ); ?></div>
    	</nav>
    <?php endif; ?>

    <?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php _e( 'Comments are closed.' , 'osea-theme' ); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(); ?>
