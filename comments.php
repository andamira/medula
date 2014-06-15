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

		<h3 id="comments-title" class="h2"><?php comments_number( __( '<span>No</span> Comments', 'osea-theme' ), __( '<span>One</span> Comment', 'osea-theme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'osea-theme' ) );?></h3>

		<section class="comments-list">
		<?php
			wp_list_comments( array(
			'style'				=> 'div',
			'short_ping'		=> true,
			'avatar_size'		=> 40,
			if ( function_exists('osea_comments_layout') ) {
				'callback'		=> 'osea_comments_layout',
			} 
			'type'              => 'all',
			'reply_text'        => 'Reply',
			'page'              => '',
			'per_page'          => '',
			'reverse_top_level' => null,
			'reverse_children'  => ''
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
