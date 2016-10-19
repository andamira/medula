<?php
/**
 * Single Template (for a specific Custom Post Type)
 *
 * NOTE: The name of this template should reflect the slug of your CPT.
 *
 * NOTE: Be aware of 'CTCAT' and 'CTTAG' in the footer entry-meta (#).
 * Those are example custom taxonomies, like the ones you can create
 * following the instructions in /plugin/lib/custom-post-tax.php .
 *
 * @link http://codex.wordpress.org/Post_Type_Templates
 */

get_header();
?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php medula_entry_title( 'h1' ); ?>
				<div class="entry-meta"><?php medula_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<div class="entry-meta"><?php // medula_entry_meta_tags('CTTAG'); medula_entry_meta_categories('CTCAT'); ?></div>
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
