<?php
/**
 * Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @link https://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 */

get_header();
?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

			<header class="entry-header">
				<?php medula_entry_title( 'h1' ); ?>
				<div class="entry-meta"><?php medula_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-meta"><?php medula_entry_meta_tags(); medula_entry_meta_categories(); ?></div>
			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; else :

		medula_post_not_found( basename( __FILE__ ) );

	endif; ?>

</main>

<?php
get_sidebar();
get_footer();
