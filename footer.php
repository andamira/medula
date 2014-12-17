<?php
/*
 * Footer Template
 *
 * Codex:
 * http://codex.wordpress.org/Function_Reference/get_footer
 *
 */
?>
			</div> <?php // (#site-content-wrapper) opening tag in header.php ?>

			<footer class="site-footer" role="contentinfo">

				<?php osea_debug_showfile( __FILE__ ); ?>

				<div id="site-footer-wrapper" class="site-wrapper">

					<nav class="site-footer-nav" role="navigation"><?php osea_site_footer_nav(); ?></nav>

					<span class="site-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>

				</div>

			</footer>

			<?php // js scripts that loads in the footer are defined in lib/osea.php ?>
			<?php wp_footer(); ?>

		</div> <?php // (#page-wrapper) opening tag in header.php ?>

		<?php // MMenu (Mobile) Menu. The last so it doesn't get in the way ?>
		<nav id="mmenu" class="site-mmenu-nav" role="navigation"><?php osea_site_mmenu_nav(); ?></nav>

	</body>

</html>
