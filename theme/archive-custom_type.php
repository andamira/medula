<?php
/**
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * @link http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php
if ( defined( 'TOOLSET_LAYOUTS' ) && TOOLSET_LAYOUTS ) {

	if ( function_exists( 'the_ddlayout' ) ) { 
		get_header('layouts');
		the_ddlayout();
		//the_ddlayout( 'default-layout', array('post-content-callback' => 'function_name', 'allow_overrides' => 'false') );
		get_footer('layouts');
	}

} else {

	get_header();
?>

	<main role="main">

		<header class="page-header">
			<h1 class="page-title"> <?php post_type_archive_title(); ?></h1>
		</header>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

				<header class="entry-header">
					<?php medula_entry_title( 'h2', true ); ?>
					<div class="entry-meta"><?php medula_entry_meta_byline(); medula_entry_meta_tags() ?></div>
				</header>

				<section class="entry-content">
					<?php the_excerpt(); ?>
				</section>

				<footer class="entry-footer">
					<?php medula_comments_count( true ); ?>
					<div class="entry-meta"><?php medula_entry_meta_tags('custom_tag'); medula_entry_meta_categories('custom_cat'); ?></div>
				</footer>

			</article>

		<?php endwhile; ?>

			<?php medula_page_navi(); ?>

		<?php else : ?>

			<?php medula_no_post_found( basename( __FILE__ ) ); ?>

		<?php endif; ?>

	</main>

<?php
	get_sidebar();
	get_footer();

}
