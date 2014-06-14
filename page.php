<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<?php edit_post_link(); ?>
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
