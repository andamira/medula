<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
				<?php osea_entry_title( 'h1' ); ?>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
				<?php osea_page_links(); ?>
			</section>

			<footer class="entry-footer">
			</footer>

			<?php comments_template( '', true ); ?>

		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'osea-theme' ); ?></h2>
		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
