<?php
/*
 * Footer Template
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/get_footer
 *
 */
?>
			</div> <?php // (#content-wrapper) opening tag in header.php ?>

			<footer class="site-footer" role="contentinfo">

				<?php osea_debug_showfile( __FILE__ ); ?>

				<nav class="site-footer-nav" role="navigation"><?php osea_site_footer_nav(); ?></nav>

				<span class="site-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>

			</footer>

			<?php // js scripts that loads in the footer are defined in lib/osea.php ?>
			<?php wp_footer(); ?>

		</div> <?php // (#page-wrapper) opening tag in header.php ?>

	<?php // MMenu (Mobile) Menu ?>
	<nav id="mmenu" class="site-mmenu-nav" role="navigation"><?php osea_site_mmenu_nav(); ?></nav>

	</body>

</html>
