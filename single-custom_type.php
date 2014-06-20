<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware of 'custom_cat' and 'custom_tag' in the entry footer
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="entry-header">
				<?php osea_entry_title( 'h1' ); ?>
				<div class="entry-meta"><?php osea_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-meta"><?php osea_entry_meta_tags('custom_tag'); osea_entry_meta_categories('custom_cat'); ?></div>
			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; else : ?>

		<article id="post-not-found" class="hentry">
			<header class="entry-header">
				<h1><?php _e( 'Post Not Found!', 'osea-theme' ); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Something is missing. Try double checking things.', 'osea-theme' ); ?></p>
			</section>
			<footer class="entry-footer">
				<p class="alert-error"><?php _e( 'This is the error message in the single-custom_type.php template.', 'osea-theme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
