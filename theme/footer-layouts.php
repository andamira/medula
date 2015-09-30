<?php
/**
 * Footer Template when using Toolset Layouts
 *
 */
?>

	</div> <?php // container of layouts containers ?>

	<?php do_action( 'wpbootstrap_before_footer' ); ?>
	<footer class="site-footer" role="contentinfo">

		<div id="site-footer-wrapper">

			<nav class="site-footer-nav" role="navigation"><?php medula_site_footer_nav(); ?></nav>

			<span class="site-footer-copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>

		</div>

	</footer>
	<?php do_action( 'wpbootstrap_after_footer' ); ?>

<?php do_action( 'wpbootstrap_before_wp_footer' ); ?>
<?php wp_footer(); ?>
<?php do_action( 'wpbootstrap_after_wp_footer' ); ?>

</body>
</html>
