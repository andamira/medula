<?php get_header(); ?>

<main role="main">

	<header class="page-header">
		<h1 class="page-title">
		<?php if (is_category()) { ?>
			<span><?php _e( 'Posts Categorized:', 'osea-theme' ); ?></span> <?php single_cat_title(); ?>

		<?php } elseif (is_tag()) { ?>
			<span><?php _e( 'Posts Tagged:', 'osea-theme' ); ?></span> <?php single_tag_title(); ?>

		<?php } elseif (is_author()) {
			global $post;
			$author_id = $post->post_author;
		?>
			<span><?php _e( 'Posts By:', 'osea-theme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

		<?php } elseif (is_day()) { ?>
			<span><?php _e( 'Daily Archives:', 'osea-theme' ); ?></span> <?php the_time( get_option('date_format') ); ?>

		<?php } elseif (is_month()) { ?>
			<span><?php _e( 'Monthly Archives:', 'osea-theme' ); ?></span> <?php the_time('F Y'); ?>

		<?php } elseif (is_year()) { ?>
			<span><?php _e( 'Yearly Archives:', 'osea-theme' ); ?></span> <?php the_time('Y'); ?>
		<?php } ?>
		</h1>

	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article">

			<header class="entry-header">
				<?php osea_entry_title( 'h2', true ); ?>
				<div class="entry-meta"><?php osea_entry_meta_byline(); osea_entry_meta_tags() ?></div>

			</header>

			<section class="entry-content">
				<?php the_post_thumbnail(); ?>
				<?php the_excerpt(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-meta"><?php osea_entry_meta_tags(); osea_entry_meta_categories(); ?></div>
			</footer>

		</article>

	<?php endwhile; ?>

		<?php osea_page_navi(); ?>

	<?php else : ?>

		<article id="post-not-found" class="hentry">
			<header class="entry-header">
				<h1><?php _e( 'Post Not Found!', 'osea-theme' ); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Something is missing. Try double checking things.', 'osea-theme' ); ?></p>
			</section>
			<footer class="entry-footer">
				<p class="alert-error"><?php _e( 'This is the error message in the archive.php template.', 'osea-theme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
