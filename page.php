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

	<?php endwhile; else: ?>

		<article id="post-not-found" class="hentry">
			<header class="entry-header">
				<h1><?php _e( 'Post Not Found!', 'osea-theme' ); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Something is missing. Try double checking things.', 'osea-theme' ); ?></p>
			</section>
			<footer class="entry-footer">
				<p class="alert-error"><?php _e( 'This is the error message in the page.php template.', 'osea-theme' ); ?></p>
			</footer>
        </article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
