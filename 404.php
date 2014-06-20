<?php get_header(); ?>

<main role="main">

	<article id="post-not-found" class="hentry">

		<header class="entry-header">
			<h1><?php _e( '404 - Post Not Found', 'osea-theme' ); ?></h1>
		</header>

		<section class="entry-content">
			<p><?php _e( 'The article you were looking for was not found, try looking again!', 'osea-theme' ); ?></p>
		</section>

		<section class="search">
				<p><?php get_search_form(); ?></p>
		</section>

		<footer class="entry-footer">
				<p class="alert-error"><?php _e( 'This is the 404.php template.', 'osea-theme' ); ?></p>
		</footer>

	</article>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
