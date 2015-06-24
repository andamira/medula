<?php
/**
 * Footer Template when using Toolset Layouts
 *
 */
?>

			</section><? // #content ?>

		</div><?php // #main ?>

		<?php do_action( 'wpbootstrap_before_footer' ); ?>

			<footer class="site-footer" role="contentinfo">
			</footer>

		<?php do_action( 'wpbootstrap_after_footer' ); ?>

	</div><?php // .container ?>

<?php do_action( 'wpbootstrap_before_wp_footer' ); ?>
<?php wp_footer(); ?>
<?php do_action( 'wpbootstrap_after_wp_footer' ); ?>

</body>
</html>
