<?
/**
 * Sidebar Template
 *
 * @link https://developer.wordpress.org/reference/functions/dynamic_sidebar/
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 */

echo '<aside id="sidebar1" class="sidebar" role="complementary">';

	if ( is_active_sidebar( 'sidebar1' ) ) {

		dynamic_sidebar( 'sidebar1' );

	} else {

		// echo '<div class="no-widgets alert-info"><p>' . __( 'Empty widget area', 'medula' ) . '</p></div>';

	}

echo '</aside>';

