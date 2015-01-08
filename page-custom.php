<?php
/**
 * Template Name: Custom Template
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template
 *
 * @link http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
				<?php osea_debug_showfile( __FILE__ ); ?>
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

		<?php osea_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
