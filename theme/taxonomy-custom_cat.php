<?php
/**
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * @link http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
 */
?>

<?php get_header(); ?>

<main role="main">

	<header class="page-header">
		<h1 class="page-title"><span><?php _e( 'Posts Categorized:', 'medula-theme' ); ?></span> <?php single_cat_title(); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="article-header">

				<?php medula_entry_title( 'h2', true ); ?>

				<p class="byline vcard">
					<div class="entry-meta"><?php medula_entry_meta_byline(); medula_entry_meta_tags() ?></div>
				</p>

			</header>

			<section class="entry-content">
				<?php the_excerpt( '<span class="read-more">' . __( 'Read More &raquo;', 'medula-theme' ) . '</span>' ); ?>

			</section>

			<footer class="article-footer">
				<div class="entry-meta"><?php medula_entry_meta_tags( 'custom_tag' ); medula_entry_meta_categories( 'custom_cat' ); ?></div>
			</footer>

		</article>

	<?php endwhile; ?>

		<?php medula_page_navi(); ?>

	<?php else : ?>

		<?php medula_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
