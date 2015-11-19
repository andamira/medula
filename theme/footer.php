<?php
/**
 * Footer Template
 *
 * - Closes the #site-content and #page-wrapper id tags opened in header.php
 * - Shows the footer and the footer navigation menu
 * - Loads The js scripts
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 */
?>
			</div> <?php // (#site-content-wrapper) ?>

			<footer class="site-footer">

				<div id="site-footer-wrapper" class="site-wrapper">

					<nav class="site-footer-nav"><?php medula_site_footer_nav(); ?></nav>

					<span class="site-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>

				</div>

			</footer>

			<?php // js scripts that load in the footer are defined in lib/medula.php 
				wp_footer();
			?>

		</div> <?php // (#page-wrapper) ?>

	</body>

</html>
