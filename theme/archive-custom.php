<?php
/**
 * Archive Template (for a specific Custom Post Type)
 *
 * NOTE: The name of this template should reflect the slug of your CPT.
 *
 * NOTE: Be aware of 'CTCAT' and 'CTTAG' in the footer entry-meta (#).
 * Those are example custom taxonomies, like the ones you can create
 * following the instructions in /plugin/lib/custom-post-tax.php .
 *
 * @link http://codex.wordpress.org/Post_Type_Templates
*/

if ( medula_template_override('') ) { return; }

get_header();
?>

<main>

	<header class="page-header">
		<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php medula_entry_title( 'h2', true ); ?>
				<div class="entry-meta"><?php medula_entry_meta_byline(); medula_entry_meta_tags(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_excerpt(); ?>
			</section>

			<footer class="entry-footer">
				<?php medula_comments_count( true ); ?>
				<div class="entry-meta"><?php // medula_entry_meta_tags('CTTAG'); medula_entry_meta_categories('CTCAT'); ?></div>
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
