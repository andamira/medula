<?php
/**
 * This is the Core Ósea library file, where
 * most of the main functions and features reside.
 *
 * If you have any custom functions, it's best
 * to put them in the functions.php file, or in
 * any of the suitable files included from there.
 *
 * URL: http://andamira.net/osea/
 *
 *		1 Cleanup (remove rsd, uri links, junk css, etc)
 *		2 Enqueueing scripts & styles
 *		3 Theme support functions
 *		4 Related post function
 *		5 Page-navi function
 *		7 Debug functions
 */


/**
 * 1 CLEANUP
 * ************************************************************
 */

function osea_head_cleanup() {
	// category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'osea_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'osea_remove_wp_ver_css_js', 9999 );

}

// remove WP version from RSS
function osea_rss_version() { return ''; }

// remove WP version from scripts
function osea_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function osea_remove_wp_widget_recent_comments_style() {
   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function osea_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove injected CSS from gallery
function osea_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function osea_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// remove the annoying […] and change it to a Read More link
function osea_excerpt_more($more) {
	global $post;
	return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) .
		'" title="'.__( 'Read', 'osea-theme' ) . get_the_title($post->ID).'">'.
		__( 'Read more &raquo;', 'osea-theme' ) .'</a>';
}

/**
 * filter html output
 *
 * @see:source http://stackoverflow.com/a/17472755
 * @see https://core.trac.wordpress.org/changeset/28708
 */
function osea_optimize_html_callback( $buffer ) {
	// option 1 ( http://wordpress.org/support/topic/how-do-i-strip-out-all-whitespace-via-a-filter )
	//buffer = str_replace( array( "\n", "\t", '  ' ), '', $buffer );

	// option 2 ( http://stackoverflow.com/a/6225706 )
	$search = array(
		'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
		'/[^\S ]+\</s',  // strip whitespaces before tags, except space
		'/(\s)+/s'       // shorten multiple whitespace sequences
	);  
	$replace = array(
		'>',
		'<',
		'\\1'
	);  
	$buffer = preg_replace($search, $replace, $buffer);

	return $buffer;
}
function osea_optimize_html_buffer_start() { ob_start("osea_optimize_html_callback"); }
function osea_optimize_html_buffer_end() { ob_end_flush(); }


/**
 * 2 SCRIPTS & ENQUEUEING
 * ************************************************************
 * loads moderniz, jquery, and reply script
 */

function osea_scripts_and_styles() {

	if (!is_admin()) {

		// modernizr
		wp_register_script( 'osea-modernizr', get_stylesheet_directory_uri() . '/lib/js/compat/modernizr.custom.min.js', array(), '2.8.3', false );

		// register main stylesheet
		wp_register_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/lib/css/style.css', array(), '', 'all' );

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
		}

		//adding scripts file in the footer
		wp_register_script( 'osea-js', get_stylesheet_directory_uri() . '/lib/js/scripts.php', array( 'jquery' ), '', true );

		// enqueue styles and scripts
		wp_enqueue_script( 'osea-modernizr' );
		wp_enqueue_style( 'main-stylesheet' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'osea-js' );
	}
	
	// Admin styles are defined in:
	// lib/admin.php
}


/**
 * 3 WP 3+ FUNCTIONS & THEME SUPPORT
 * ************************************************************
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/add_theme_support
 *
 * Generator:
 * http://generatewp.com/theme-support/
 */

function osea_theme_support() {

	// thumbnails support defined in:
	// lib/thumbnails.php

	// post format support defined in:
	// medula/post-formats.php

	// menus support is defined in:
	// medula/menus.php

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => '',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss support
	add_theme_support('automatic-feed-links');

	/* TITLE TAG SUPPORT
	 * @see:codex http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 * @since 4.1.0
	 */
	add_theme_support( 'title-tag' );

	// HTML5 SUPPORT
	// http://codex.wordpress.org/Semantic_Markup
	$args = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	);
	add_theme_support( 'html5', $args );

}

/**
 * This is the maximum width in pixels for your content area
 *
 * @see:codex http://codex.wordpress.org/Content_Width
 */
if ( ! isset( $content_width ) ) {
	    $content_width = 640;
}




/**
 * 4 RELATED POSTS FUNCTION
 * ************************************************************
 */

// Related Posts Function (call using osea_related_posts(); )
function osea_related_posts() {
	echo '<ul id="osea-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts( $args );
        if($related_posts) {
        	foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
	           	<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; }
	    else { ?>
            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'osea-theme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
}


/**
 * 5 PAGE NAVI
 * ************************************************************
 */

// Numeric Page Navi (built into the theme by default)
function osea_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;

  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
}


/**
 * 6 DEBUG FUNCTIONS
 * ************************************************************
 */

// This debug function displays the template filename
// It's Called from all the template files, at the header/top
function osea_debug_showfile( $file ) { 
	if ( defined( 'OSEA_DEBUG' ) && OSEA_DEBUG ) { 
		echo '<span class="osea-debug-filename alert-info">';
		echo __('File: ', 'osea-theme');
		echo basename( $file );
		echo '</span>';
	}   
}

// This debug function adds a debug class to the body
function osea_debug_body_class() { 
	if ( defined( 'OSEA_DEBUG' ) && OSEA_DEBUG ) { 
		return 'debug';
	}
}

