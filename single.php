<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

			<header class="entry-header">
				<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); osea_entry_edit_post(); ?></h1>
				<div class="entry-meta"><?php osea_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content cf" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-meta"><?php osea_entry_meta_tags(); osea_entry_meta_categories(); ?></div>
			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; ?>

	<?php else : ?>

		<article id="post-not-found" class="hentry">

				<header class="entry-header">
					<h1><?php _e( 'Post Not Found!', 'osea-theme' ); ?></h1>
				</header>

				<section class="entry-content">
					<p><?php _e( 'Something is missing. Try double checking things.', 'osea-theme' ); ?></p>
				</section>

				<footer class="article-footer">
						<p><?php _e( 'This is the error message in the single.php template.', 'osea-theme' ); ?></p>
				</footer>

		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
