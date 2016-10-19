<?php
/**
 * Template Name: Example Template
 *
 *
 * Instructions
 *
 * - Copy this file and move it to the root of the theme.
 * - Rename the file to something like "page-thenameyoudesire.php".
 * - Finally, change the "Example Template" name to the one you desire.
 * - The template name will appear in the Page Attributes metabox on the page editor.
 *
 * @link https://make.wordpress.org/support/user-manual/content/pages/page-attributes/
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
*/

if ( medula_template_override('') ) { return; }

get_header();
?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
				<?php medula_entry_title( 'h1' ); ?>
				<div class="entry-meta"><?php medula_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
				<?php medula_page_links(); ?>
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
