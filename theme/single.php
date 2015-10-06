<?php

if ( defined( 'TOOLSET_LAYOUTS' ) && TOOLSET_LAYOUTS ) {

	if ( function_exists( 'the_ddlayout' ) ) { 
		get_header('layouts');
		the_ddlayout();
		//the_ddlayout( 'default-layout', array('post-content-callback' => 'function_name', 'allow_overrides' => 'false') );
		get_footer('layouts');
	}

} else {

	get_header();
?>

	<main role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

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

		<?php endwhile; else : ?>

			<?php medula_no_post_found( basename( __FILE__ ) ); ?>

		<?php endif; ?>

	</main>

<?php
	get_sidebar();
	get_footer();

} // TOOLSET_LAYOUTS
