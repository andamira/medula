<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

<main role="main">

	<header class="page-header">
		<?php osea_debug_showfile( __FILE__ ); ?>
		<h1 class="page-title"> <?php post_type_archive_title(); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

			<header class="entry-header">
				<?php osea_entry_title( 'h2', true ); ?>
                <div class="entry-meta"><?php osea_entry_meta_byline(); osea_entry_meta_tags() ?></div>
			</header>

			<section class="entry-content">
				<?php the_excerpt(); ?>
			</section>

			<footer class="entry-footer">
				<?php osea_comments_count( true ); ?>
				<div class="entry-meta"><?php osea_entry_meta_tags('custom_tag'); osea_entry_meta_categories('custom_cat'); ?></div>
			</footer>

		</article>

	<?php endwhile; ?>

		<?php osea_page_navi(); ?>

	<?php else : ?>

		<?php osea_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
