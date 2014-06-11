<?php
/*
 * This is the Core Andamira Ósea file, where
 * most of the main functions and features reside.
 *
 * If you have any custom functions, it's best
 * to put them in the functions.php file, or in
 * any of the suitable includes there.
 *
 * URL: http://andamira.net/osea/
 *
 *
 *
 *	- head cleanup (remove rsd, uri links, junk css, ect)
 *	- enqueueing scripts & styles
 *	- theme support functions
 *	- custom menu output & fallbacks
 *	- related post function
 *	- page-navi function
 *	- removing <p> from around images
 */


/*********************
 * WP_HEAD CLEANUP
 *********************/

function osea_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
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

} /* end osea head cleanup */

// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;

  // Don't affect in feeds.
  if ( is_feed() ) return $title;

  // Add the blog's name
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " {$sep} {$site_description}";
  }

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }

  return $title;

} /* end better title */


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


/*********************
 * SCRIPTS & ENQUEUEING
 *********************/

// loading modernizr and jquery, and reply script
function osea_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {

    // modernizr (without media query polyfill)
    wp_register_script( 'osea-modernizr', get_stylesheet_directory_uri() . '/lib/js/libs/modernizr.custom.min.js', array(), '2.8.2', false );

    // register main stylesheet
    wp_register_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/lib/css/style.css', array(), '', 'all' );

    // ie-only style sheet
    wp_register_style( 'styles-ie-only', get_stylesheet_directory_uri() . '/lib/css/ie.css', array(), '' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		  wp_enqueue_script( 'comment-reply' );
    }

    //adding scripts file in the footer
	wp_register_script( 'osea-js', get_stylesheet_directory_uri() . '/lib/js/scripts.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
    wp_enqueue_script( 'osea-modernizr' );
    wp_enqueue_style( 'main-stylesheet' );
    wp_enqueue_style( 'styles-ie-only' );

    $wp_styles->add_data( 'styles-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'osea-js' );
  }
}

/*********************
 * WP 3+ FUNCTIONS & THEME SUPPORT
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/add_theme_support
 *
 * Examples:
 * http://generatewp.com/theme-support/
 *********************/

function osea_theme_support() {

	// thumbnails support defined in:
	// lib/thumbnails.php

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

	// rss thingy
	add_theme_support('automatic-feed-links');

	// post format support defined in:
	// lib/plugin/post-formats.php

	// wp menus support defined in:
	// lib/plugin/menus.php

	// HTML5
	// http://codex.wordpress.org/Semantic_Markup
	add_theme_support( 'html5' );
		$args = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	);
	add_theme_support( 'html5', $args );

	// Add theme support for custom CSS in the TinyMCE visual editor
	// 	add_editor_style( '' );	

} /* end osea theme support */


/*********************
* RELATED POSTS FUNCTION
 *********************/

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
            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'andamira-osea' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
} /* end osea related posts function */


/*********************
 * PAGE NAVI
 ********************/

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
} /* end page navi */


/*********************
 * RANDOM CLEANUP ITEMS
 *********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function osea_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function osea_excerpt_more($more) {
	global $post;
	// edit here if you like
return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'andamira-osea' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'andamira-osea' ) .'</a>';
}



?>