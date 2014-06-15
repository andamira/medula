<?php get_header(); ?>

<main role="main">
	<header>
		<h1 class="page-title"><?php wp_title(''); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
			<header class="entry-header">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-byline vcard">
					<?php printf( __( 'Posted %1$s by %2$s', 'osea-theme' ),
						'<time class="entry-time updated" datetime="' . get_the_time('Y-m-d') . '" pubdate>' . get_the_time(get_option('date_format')) . '</time>',
						'<address class="entry-author">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</address>'
					); ?>
				</div>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-comment-count">
					<?php comments_number( __( '<span>No</span> Comments', 'osea-theme' ), __( '<span>One</span> Comment', 'osea-theme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'osea-theme' ) );?>
				</div>
				<?php printf( '<div class="entry-categories">' . __('filed under', 'osea-theme' ) . ': %1$s</div>' , get_the_category_list(', ') ); ?>
				<?php the_tags( '<div class="entry-tags tags"><span class="entry-tags-title">' . __( 'Tags:', 'osea-theme' ) . '</span> ', ', ', '</div>' ); ?>
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
