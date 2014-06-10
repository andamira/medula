<?php
/*
 * This is the Comments template
 *
 * Author: andamira
 * URL: htp://andamira.net/osea/
 *
 */


/*
 * CUSTOM COMMENT LAYOUT
 */
function osea_comments_layout( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
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
        ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/lib/img/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'andamira-osea' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'andamira-osea' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'andamira-osea' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'andamira-osea' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php

} /* end of osea_comments_layout */






?>
