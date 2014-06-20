<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

			<header class="entry-header">
				<?php osea_entry_title( 'h1' ); ?>
				<div class="entry-meta"><?php osea_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-meta"><?php osea_entry_meta_tags(); osea_entry_meta_categories(); ?></div>
			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; else : ?>

		<?php osea_post_not_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
