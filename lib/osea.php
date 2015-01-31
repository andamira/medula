<?php
/**
 * This is the Core Ósea library file, where
 * most of the main functions and features reside.
 *
 * If you have any custom functions, it's best
 * to put them in the functions.php file, or in
 * any of the suitable files included from there.
 *
 *     1 Enqueueing Scripts & Styles
 *
 *     2 Theme Support
 *
 *         2.1 Custom Background
 *         2.2 Title Tag
 *         2.3 Feed Links              (#)
 *         2.4 HTML5
 *
 *         2.5 Maximum Content Witdh
 *
 *      3 Related Post Function
 *
 *      4 Page-Navi Function
 *
 *      5 Cleanup (Remove RSD, URI Links, Junk CSS, etc.)
 *
 *          5.1 Head
 *          5.1 WP Version
 *          5.3 Injected CSS
 *          5.4 p tags around img
 *          5.5 Read More Link
 *
 *      6 Filter HTML Output
 *
 *      7 Debug Functions
 */


/**
 * 1 SCRIPTS & ENQUEUEING
 * ************************************************************
 * Loads Modernizr, jQuery, and reply script
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
 * 2 THEME SUPPORT
 * ************************************************************
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
 * @link http://generatewp.com/theme-support/ Theme Support Generator
 */

function osea_theme_support() {

	// thumbnails support defined in:
	// lib/thumbnails.php
	
	// menus support is defined in:
	// lib/menus.php
	
	// post format support defined in:
	// medula/post-formats.php

	/**
	 * 2.1 CUSTOM BACKGROUND
	 */
	add_theme_support( 'custom-background',
	array(
		'default-image' => '',    // background image default
		'default-color' => '',    // background color default (don't add the #)
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
		)
	);

	/**
	 * 2.2 TITLE TAG SUPPORT
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 * @since 4.1.0
	 */
	add_theme_support( 'title-tag' );

	/**
	 * 2.3 FEED LINKS
	 *
	 * Enables post and comment RSS feed links to head.
	 */
	# add_theme_support('automatic-feed-links');              // (#) disabled by default

	/**
	 * 2.4 HTML5 SUPPORT
	 *
	 * @link http://codex.wordpress.org/Semantic_Markup
	 */
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
 * 2.5 MAXIMUM CONTENT WIDTH
 *
 * This is the maximum width in pixels for your content area
 *
 * @link http://codex.wordpress.org/Content_Width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}


/**
 * 3 RELATED POSTS FUNCTION
 * ************************************************************
 * call using osea_related_posts();
 */

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
			'numberposts' => 5, // you can change this to show more
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
 * 4 PAGE NAVI
 * ************************************************************
 * Numeric Page Navi (built into the theme by default)
 */

function osea_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
	return;

	echo '<nav class="pagination">';
	echo paginate_links( array(
		'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
		'format'    => '',
		'current'   => max( 1, get_query_var('paged') ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'list',
		'end_size'  => 3,
		'mid_size'  => 3,
		'add_args' => false
	) );
	echo '</nav>';
}


/**
 * 5 CLEANUP
 * ************************************************************
 */

/**
 * 5.1 HEAD CLEANUP
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

/**
 * 5.2 WP VERSION CLEANUP FUNCTIONS
 */

// remove WP version from RSS
function osea_rss_version() { return ''; }

// remove WP version from scripts
function osea_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

/**
 * 5.3 INJECTED CSS CLEANUP FUNCTIONS
 */

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

/**
 * 5.4 P TAGS AROUND IMG CLEANUP
 *
 * @link http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
 */
function osea_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
 * 5.5 READ MORE LINK FORMAT
 *
 * remove the annoying […] and change it to a Read More link
 */
function osea_excerpt_more($more) {
	global $post;
	return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) .
		'" title="'.__( 'Read', 'osea-theme' ) . get_the_title($post->ID).'">'.
		__( 'Read more &raquo;', 'osea-theme' ) .'</a>';
}


/**
 * 6 FILTER HTML OUTPUT
 *
 * @link http://stackoverflow.com/a/17472755
 * @link https://core.trac.wordpress.org/changeset/28708
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
 * 7 DEBUG FUNCTIONS
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


/**
 * 8 UTILITY FUNCTIONS
 * ************************************************************
 */

/**
 * 8.1 PROTOCOL (HTTP(S))
 * 
 * @link http://codex.wordpress.org/Function_Reference/is_ssl
 * @link https://gist.github.com/webaware/4688802
 * @link http://snippets.webaware.com.au/snippets/wordpress-is_ssl-doesnt-work-behind-some-load-balancers/
 */
function osea_get_protocol() {
	if ( is_ssl() ) {
		return  "https://";
	} else {
		return "http://";
	}
}

if (stripos(get_option('siteurl'), 'https://') === 0) {
	$_SERVER['HTTPS'] = 'on';

	// NOTE: Uncomment the next add_action() line if your WordPress
    // instalation can't detect that SSL is being used:
	# add_action('wp_print_scripts', 'force_ssl_url_scheme_script');
}

// JavaScript detection of page protocol
function force_ssl_url_scheme_script() {
?>
<script>
	if (document.location.protocol != "https:") {
	document.location = document.URL.replace(/^http:/i, "https:");
	}
</script>
<?php
} 



