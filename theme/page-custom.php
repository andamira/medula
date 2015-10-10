<?php
/**
 * Template Name: Custom Template Example
 *
 * You can create as many of these custom templates as you need. Simply
 * name the file "page-whatever.php" and change the "Template Name" title
 * at the top, to the one you desire.
 *
 * When you create your page, you can just select the template from the metabox.
 *
 * @link http://codex.wordpress.org/Page_Templates
*/
?>

<?php
if ( medula_toolset_layout('') ) { return; }

get_header();
?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

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

	<?php endwhile; else : ?>

		<?php medula_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();
