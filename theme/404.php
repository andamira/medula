<?php
/**
 * 404 Template
 *
 * @link  https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header();
?>

<main role="main">

	<article id="post-not-found">

		<header class="entry-header">
			<h1><?php _e( 'Not Found', 'medula' ); ?></h1>
		</header>

		<section class="entry-content">
			<p><?php _e( 'The article you were looking for was not found, try looking again!', 'medula' ); ?></p>
		</section>

		<section class="search">
				<p><?php get_search_form(); ?></p>
		</section>

		<footer class="entry-footer">
		</footer>

	</article>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
