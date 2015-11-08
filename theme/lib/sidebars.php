<?php 
/**
 * Sidebars template
 *
 * To add more sidebars or widgetized areas, just copy
 * and edit the register_sidebar function, modifying
 * the ID, name and description to new values. e.g.:
 *
 *     'id' => 'sidebar2',
 *     'name' => __( 'Sidebar 2', 'medula' ),
 *     'description' => __( 'The secondary sidebar.', 'medula' ),
 *
 * To call the sidebar in your template, you can just copy
 * the sidebar.php file in the root and rename it adding
 * your new sidebar's id to the file name. e.g.:
 *
 *     sidebar-sidebar2.php
 *
 * And call it in the template like this:
 *
 *     get_sidebar('sidebar2');
 *
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


