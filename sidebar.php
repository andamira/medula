<aside id="sidebar1" class="sidebar" role="complementary">
<?php

	if ( is_active_sidebar( 'sidebar1' ) ) {

		dynamic_sidebar( 'sidebar1' );

	} else {

		echo '<div class="no-widgets"><p>' . __( 'Empty widget area', 'osea-theme' ) . '</p></div>';

	}

?>
</aside>
