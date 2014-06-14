<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<header class="entry-header">
				<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
				<div class="byline vcard">
					<?php printf( __( 'Posted %1$s by %2$s', 'osea-theme' ),
						'<time class="updated" datetime="' . get_the_time('Y-m-d') . '" pubdate>' . get_the_time(get_option('date_format')) . '</time>',
						'<span class="author">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
					); ?>
				</div>
			</header>

			<section class="entry-content cf" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="article-footer">
				<?php edit_post_link(); ?>
				<?php printf( __( 'Filed under: %1$s', 'osea-theme' ), get_the_category_list(', ') ); ?>
				<?php the_tags( '<div class="tags"><span class="tags-title">' . __( 'Tags:', 'osea-theme' ) . '</span> ', ', ', '</div>' ); ?>
			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; ?>

	<?php else : ?>

		<article id="post-not-found" class="hentry">
				<header class="article-header">
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

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
