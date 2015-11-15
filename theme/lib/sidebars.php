<?php 
/**
 * Register Sidebars Template
 *
 * To add more sidebars or widgetized areas, just copy
 * and edit the register_sidebar function, modifying
 * the 'id', 'name' and 'description to new values.
 *
 * To use the new sidebar, you can just copy the
 * sidebar.php file in the root and add your new
 * sidebar's id to the file name, like this:
 *
 *     sidebar-sidebar2.php
 *
 * And call it from the template, like this:
 *
 *     get_sidebar('sidebar2');
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 */

function medula_register_sidebars() {

	// Sidebar 1

	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'medula' ),
		'description' => __( 'The first (primary) sidebar.', 'medula' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	// ...



}

