<?php
/**
 * Footer Template (for Toolset Layouts)
 *
 * - Closes the .layouts-containers tag that was opened in header-layouts.php
 * - Shows the footer and the footer navigation menu
 * - Loads The js scripts
 */
?>

		</div> <?php // (.layouts-containers) ?>
		<?php

		// If you prefer to create the footer in a parent Layout,
		// you can delete the footer section from this template.

		?>
		<footer class="site-footer" role="contentinfo">

			<div id="site-footer-wrapper">

				<nav class="site-footer-nav" role="navigation"><?php medula_site_footer_nav(); ?></nav>

				<span class="site-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>

			</div>

		</footer>

		<?php // js scripts that load in the footer are defined in lib/medula.php 
			wp_footer();
		?>

	</body>

</html>
