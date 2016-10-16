<?php
/**
 * Main Library Template
 *
 *     >----------------->
 *
 *     1 Enqueueing Scripts & Styles
 *
 *     2 Theme Support
 *
 *         2.1 Custom Background
 *         2.2 Title Tag
 *         2.3 Feed Links
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
 *          5.6 &nbsp; unichode characters
 *          5.7 Remove Pingbacks to Self
 *          5.8 Remove microformats classes
 *
 *      6 Utility Functions
 *
 *          6.1 http(s) Protocol Fix
 *
 *      <------------------<
 */


/**
 * 1 ENQUEUEING SCRIPTS & STYLES
 * ************************************************************
 */

// Styles version can be increased after styles are updated, to avoid cache problems
$medula_styles_v="0";

function medula_scripts_and_styles() {
	global $medula_styles_v;

	if (!is_admin()) {

		// register main stylesheet
		wp_register_style( 'main-stylesheet', get_template_directory_uri() . '/res/css/main.css?v=' . $medula_styles_v, array(), '', 'all' );

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
		}

		// add scripts file in the footer
		wp_register_script( 'medula-js', get_template_directory_uri() . '/res/js/main.js', array( 'jquery' ), '', true );

		// enqueue styles and scripts
		wp_enqueue_style( 'main-stylesheet' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'medula-js' );
	}
	
	// Note: Styles for the WordPress Backend are defined in admin.php
}


/**
 * 2 THEME SUPPORT
 * ************************************************************
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
 * @link http://generatewp.com/theme-support/ Theme Support Generator
 * 
 * NOTE: 
 *     thumbnails support is defined in:     /theme/lib/thumbnails.php
 *     menus support is defined in:          /theme/lib/navigation.php
 *     post format support is not defined
 */

function medula_theme_support() {

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
	 */

	add_theme_support( 'title-tag' );

	/**
	 * 2.3 FEED LINKS
	 *
	 * Enables post and comment RSS feed links to head.
	 */

	add_theme_support( 'automatic-feed-links' );

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
 * call using medula_related_posts();
 */

function medula_related_posts() {
	echo '<ul id="medula-related-posts">';
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
			<?php endforeach;
		} else {
			echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'medula' ) . '</li>';
		}
	}

	wp_reset_postdata();
	echo '</ul>';
}


/**
 * 4 PAGE NAVI
 * ************************************************************
 * Numeric Page Navi (built into the theme by default)
 */

function medula_page_navi() {
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

function medula_cleanup_all() {

	// cleaning head (5.1)
	add_action( 'init', 'medula_head_cleanup' );

	// remove WP version from RSS (5.2)
	add_filter( 'the_generator', 'medula_rss_version' );

	// remove pesky injected css for recent comments widget (5.3)
	add_filter( 'wp_head', 'medula_remove_wp_widget_recent_comments_style', 1 );

	// clean up comment styles in the head (5.3)
	add_action( 'wp_head', 'medula_remove_recent_comments_style', 1 );

	// clean up gallery output in wp (5.3)
	add_filter( 'gallery_style', 'medula_gallery_style' );

	// cleaning up random code around images (5.4)
	add_filter( 'the_content', 'medula_filter_ptags_on_images' );

	// cleaning up excerpt (5.5)
	add_filter( 'excerpt_more', 'medula_excerpt_more' );

	// cleaning up \u00a0 unicode characters (5.6)
	add_filter( 'content_save_pre', 'medula_filter_unicode_nbsp' ); // on database
	#add_filter( 'the_content', 'medula_filter_unicode_nbsp' ); // on display

	// removing pingbacks to self (5.7)
	add_action( 'pre_ping', 'medula_no_self_pingbacks' );

	// removing hentry class (5.8)
	add_filter( 'post_class','medula_remove_hentry' );
}

/**
 * 5.1 HEAD CLEANUP
 */

function medula_head_cleanup() {
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

	// remove WP version from css (5.2)
	add_filter( 'style_loader_src', 'medula_remove_wp_ver_css_js', 9999 );

	// remove Wp version from scripts (5.2)
	add_filter( 'script_loader_src', 'medula_remove_wp_ver_css_js', 9999 );
}

/**
 * 5.2 WP VERSION CLEANUP FUNCTIONS
 */

// remove WP version from RSS
function medula_rss_version() { return ''; }

// remove WP version from scripts
function medula_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

/**
 * 5.3 INJECTED CSS CLEANUP FUNCTIONS
 */

// remove injected CSS for recent comments widget
function medula_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function medula_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function medula_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/**
 * 5.4 P TAGS AROUND IMG CLEANUP
 *
 * @link http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
 */

function medula_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
 * 5.5 READ MORE LINK FORMAT
 *
 * remove the annoying […] and change it to a Read More link
 */

function medula_excerpt_more($more) {
	global $post;
	return '...  <a class="excerpt-read-more" href="' . get_permalink($post->ID) .
		'" title="' . __( 'Read', 'medula' ) . esc_attr( get_the_title($post->ID) ) . '">'.
		__( 'Read more &raquo;', 'medula' ) .'</a>';
}

/**
 * 5.6 &NBSP; UNICODE CHARACTERS
 *
 * Remove the annoying invisible unicode characters \u00a0 and \u200b, (non-
 * breaking-space and zero-width-space) and change them to a normal space.
 * TinyMCE seems to be creating them characters when typing 2 spaces.
 *
 * @link https://core.trac.wordpress.org/ticket/6942
 * @link http://core.trac.wordpress.org/ticket/6562
 */

function medula_filter_unicode_nbsp($content){
	return preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $content);
}

/**
 * 5.7 REMOVE PINGBACKS TO SELF
 */

function medula_no_self_pingbacks( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link ) {
		if ( 0 === strpos( $link, $home ) ) {
			unset( $links[$l] );
		}
	}
}

/**
 * 5.8 REMOVE HENTRY CLASS
 *
 * Since medula uses schema microdata, and not microformats,
 * the markup is cleaner without the automatic hentry class.
 *
 * @link http://codex.wordpress.org/Function_Reference/post_class
 * @link https://core.trac.wordpress.org/ticket/28482#ticket
 */

function medula_remove_hentry( $classes ) {
    return array_diff( $classes, array( 'hentry' ) );
}


/**
 * 6 UTILITY FUNCTIONS
 * ************************************************************
 */

/**
 * 6.1 HTTP(S) PROTOCOL FIX
 *
 * @link http://snippets.webaware.com.au/snippets/wordpress-is_ssl-doesnt-work-behind-some-load-balancers/
 * @link http://codex.wordpress.org/Function_Reference/is_ssl
 * @link https://gist.github.com/webaware/4688802
 * @link http://wordpress.stackexchange.com/a/24863/39050
 */

function medula_get_protocol() {
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

	# add_action( 'wp_footer', 'medula_force_ssl_url_scheme_script' );
}

// JavaScript detection of page protocol
function medula_force_ssl_url_scheme_script() {
?>
<script>
	if (document.location.protocol != "https:") {
		document.location = document.URL.replace(/^http:/i, "https:");
	}
</script>
<?php
}

