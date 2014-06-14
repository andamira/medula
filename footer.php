<?php
/*
 * Footer Template
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/get_footer
 *
 */
?>
		<footer class="page-footer" role="contentinfo">

			<nav class="page-footer-nav" role="navigation"><?php osea_page_footer_nav(); ?></nav>

			<p class="page-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

		</footer>

		<?php // js scripts that loads in the footer are defined in lib/osea.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
