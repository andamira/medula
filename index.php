<?php get_header(); ?>

<main role="main">

	<header class="page-header">
		<h1 class="page-title"><?php wp_title(''); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="entry-header">

				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry-meta"><?php osea_entry_meta_byline(); osea_entry_edit_post( 'Edit Post' ); ?></div>

			</header>

			<section class="entry-content">

				<?php the_content(); ?>

			</section>

			<footer class="entry-footer">

				<span class="entry-comment-count">

					<?php comments_number( __( '<span>No</span> Comments', 'osea-theme' ), __( '<span>One</span> Comment', 'osea-theme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'osea-theme' ) );?>
				</span>

				<div class="entry-meta"><?php osea_entry_meta_tags();osea_entry_meta_categories(); ?></div>

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
				<p><?php _e( 'This is the error message in the index.php template.', 'osea-theme' ); ?></p>
			</footer>

		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
