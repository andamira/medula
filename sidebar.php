<aside id="sidebar1" class="sidebar" role="complementary">
<?php

	osea_debug_showfile( __FILE__ );

	if ( is_active_sidebar( 'sidebar1' ) ) {

		dynamic_sidebar( 'sidebar1' );

	} else {

		echo '<div class="no-widgets alert-info"><p>' . __( 'Empty widget area', 'osea-theme' ) . '</p></div>';

	}

?>
</aside>
