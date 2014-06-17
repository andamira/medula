<?php get_header(); ?>

<main role="main">

	<header class="page-header">
		<h1 class="page-title"><?php wp_title(''); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="entry-header">
				<?php osea_entry_title( 'h2', true ); ?>
				<div class="entry-meta"><?php osea_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<?php osea_comments_count(); ?>
				<div class="entry-meta"><?php osea_entry_meta_tags(); osea_entry_meta_categories(); ?></div>
			</footer>

		</article>

	<?php endwhile; ?>

			<?php osea_page_navi(); ?>

	<?php else : ?>

		<article id="post-not-found" class="hentry">
			<header class="entry-header">
				<h2><?php _e( 'Post Not Found!', 'osea-theme' ); ?></h2>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Something is missing. Try double checking things.', 'osea-theme' ); ?></p>
			</section>
			<footer class="entry-footer">
				<p class="alert-error"><?php _e( 'This is the error message in the index.php template.', 'osea-theme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
