<?php
/*
 * Template Name: Custom Page Example
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
				<?php osea_entry_title( 'h1' ); ?>
				<div class="entry-meta"><?php osea_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
				<?php osea_page_links(); ?>
			</section>

            <footer class="entry-footer">
                <div class="entry-meta"><?php osea_entry_meta_tags(); osea_entry_meta_categories(); ?></div>
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
				<p class="alert-error"><?php _e( 'This is the error message in the page-custom.php template.', 'osea-theme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
