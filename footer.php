<?php
/*
 * Footer Template
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/get_footer
 *
 */
?>
		</div> <?php // #content-wrapper ?>

		<footer class="site-footer" role="contentinfo">

			<nav class="site-footer-nav" role="navigation"><?php osea_site_footer_nav(); ?></nav>

			<span class="site-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>

		</footer>

		<?php // js scripts that loads in the footer are defined in lib/osea.php ?>
		<?php wp_footer(); ?>


	</body>

</html>
