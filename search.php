<?php get_header(); ?>

<main role="main">

	<header class="page-header">
		<h1 class="page-title"><span><?php _e( 'Search Results for:', 'osea-theme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="entry-header">
				<?php osea_entry_title( 'h2', true ); ?>
				<div class="entry-meta"><?php osea_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'osea-theme' ) . '</span>' ); ?>
			</section>

			<footer class="entry-footer">
				 <div class="entry-meta"><?php osea_entry_meta_tags(); osea_entry_meta_categories(); ?></div>
			</footer>

		</article>

	<?php endwhile; ?>

		<?php osea_page_navi(); ?>

	<?php else : ?>

		<article id="post-not-found" class="hentry cf">
			<header class="article-header">
				<h2><?php _e( 'Sorry, No Results.', 'osea-theme' ); ?></h2>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Try your search again.', 'osea-theme' ); ?></p>
			</section>
			<footer class="article-footer">
				<p class="alert-error"><?php _e( 'This is the error message in the search.php template.', 'osea-theme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
