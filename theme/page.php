<?php
/**
 * Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#page
 */

if ( medula_template_override('') ) { return; }

get_header();
?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
				<?php medula_entry_title( 'h1' ); ?>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
				<?php medula_page_links(); ?>
			</section>

			<footer class="entry-footer">
			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; else:

		medula_post_not_found( basename( __FILE__ ) );

	endif; ?>

</main>

<?php
get_sidebar();
get_footer();
