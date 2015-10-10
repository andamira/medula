<?php
if ( medula_template_override('') ) { return; }

get_header();
?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="entry-header">
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
				<?php medula_page_links(); ?>
			</section>

			<footer class="entry-footer">
			</footer>

		</article>

	<?php endwhile; else: ?>

		<?php medula_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php
get_footer();
