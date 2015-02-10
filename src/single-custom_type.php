<?php
/**
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
 * @link http://codex.wordpress.org/Post_Type_Templates
 */
?>

<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="entry-header">
				<?php osea_debug_showfile( __FILE__ ); ?>
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

		<?php osea_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
