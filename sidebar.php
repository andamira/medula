<aside id="sidebar1" class="sidebar" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar1' ); ?>

	<?php else : ?>

		<div class="no-widgets">
			<p><?php _e( 'Empty widget area', 'osea-theme' ); ?></p>
		</div>

	<?php endif; ?>

</aside>
