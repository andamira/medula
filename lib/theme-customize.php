<?php
/**
* Theme Customize
*
* @link http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
* @link http://natko.com/changing-default-wordpress-theme-customization-api-sections/
*/

function osea_theme_customizer( $wp_customize ) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'osea_theme_customizer' );


