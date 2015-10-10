<?php
if ( medula_template_override() ) { return; }

get_header();
?>

<main role="main">

	<header class="page-header">
		<h1 class="page-title"><?php $t= get_queried_object(); echo $t->post_title; ?></h1>
	</header>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

			<header class="entry-header">
				<?php medula_entry_title( 'h2', true ); ?>
				<div class="entry-meta"><?php medula_entry_meta_byline(); ?></div>
			</header>

			<section class="entry-content">
				<?php the_content(); ?>
			</section>

			<footer class="entry-footer">
				<?php medula_comments_count( true ); ?>
				<div class="entry-meta"><?php medula_entry_meta_tags(); medula_entry_meta_categories(); ?></div>
			</footer>

		</article>

	<?php endwhile; ?>

			<?php medula_page_navi(); ?>

	<?php else : ?>

		<?php medula_no_post_found( basename( __FILE__ ) ); ?>

	<?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();
