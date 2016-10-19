<?php
/**
 * Archive Template
 *
 * @link https://codex.wordpress.org/Creating_an_Archive_Index
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 */

get_header();
?>

<main>

	<header class="page-header">

		<h1 class="page-title">

		<?php if (is_category()) { ?>
			<span><?php _e( 'Posts Categorized:', 'medula' ); ?></span> <?php single_cat_title(); ?>

		<?php } elseif (is_tag()) { ?>
			<span><?php _e( 'Posts Tagged:', 'medula' ); ?></span> <?php single_tag_title(); ?>

		<?php } elseif (is_author()) {
			global $post;
			$author_id = $post->post_author;
		?>
			<span><?php _e( 'Posts By:', 'medula' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

		<?php } elseif (is_day()) { ?>
			<span><?php _e( 'Daily Archives:', 'medula' ); ?></span> <?php the_time( get_option('date_format') ); ?>

		<?php } elseif (is_month()) { ?>
			<span><?php _e( 'Monthly Archives:', 'medula' ); ?></span> <?php the_time('F Y'); ?>

		<?php } elseif (is_year()) { ?>
			<span><?php _e( 'Yearly Archives:', 'medula' ); ?></span> <?php the_time('Y'); ?>
		<?php } ?>

		</h1>

	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php medula_entry_title( 'h2', true ); ?>
				<div class="entry-meta"><?php medula_entry_meta_byline(); medula_entry_meta_tags(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_post_thumbnail(); ?>
				<?php the_excerpt(); ?>
			</section>

			<footer class="entry-footer">
				<?php medula_comments_count( true ); ?>
				<div class="entry-meta"><?php medula_entry_meta_tags(); medula_entry_meta_categories(); ?></div>
			</footer>

		</article>

	<?php endwhile;

		medula_page_navi();

	else :

		medula_post_not_found( basename( __FILE__ ) );

	endif; ?>

</main>

<?php
get_sidebar();
get_footer();
