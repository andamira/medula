<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
				<?php medula_entry_title( 'h1' ); ?>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
				<?php medula_page_links(); ?>
			</section>

			<footer class="entry-footer">
			</footer>

			<?php comments_template( '', true ); ?>

		</article>

	<?php endwhile; else: ?>

		<?php medula_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
