<?php
 /*
 * Here you can write your own custom taxonomies. You can
 * copy the example as a model, or use a generator like:
 * Generator: http://generatewp.com/taxonomy/
 *
 * Codex: http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

// add custom category
register_taxonomy( 'custom_cat', 
	array('custom_type'),
	array('hierarchical' => true,
		'labels' => array(
			'name' => __( 'Custom Categories', 'osea-theme' ),
			'singular_name' => __( 'Custom Category', 'osea-theme' ),
			'search_items' =>  __( 'Search Custom Categories', 'osea-theme' ),
			'all_items' => __( 'All Custom Categories', 'osea-theme' ),
			'parent_item' => __( 'Parent Custom Category', 'osea-theme' ),
			'parent_item_colon' => __( 'Parent Custom Category:', 'osea-theme' ),
			'edit_item' => __( 'Edit Custom Category', 'osea-theme' ),
			'update_item' => __( 'Update Custom Category', 'osea-theme' ),
			'add_new_item' => __( 'Add New Custom Category', 'osea-theme' ),
			'new_item_name' => __( 'New Custom Category Name', 'osea-theme' )
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'custom-slug' ),
	)
);   

// add custom tag
register_taxonomy( 'custom_tag', 
	array('custom_type'),
	array('hierarchical' => false,
		'labels' => array(
			'name' => __( 'Custom Tags', 'osea-theme' ),
			'singular_name' => __( 'Custom Tag', 'osea-theme' ),
			'search_items' =>  __( 'Search Custom Tags', 'osea-theme' ),
			'all_items' => __( 'All Custom Tags', 'osea-theme' ),
			'parent_item' => __( 'Parent Custom Tag', 'osea-theme' ),
			'parent_item_colon' => __( 'Parent Custom Tag:', 'osea-theme' ),
			'edit_item' => __( 'Edit Custom Tag', 'osea-theme' ),
			'update_item' => __( 'Update Custom Tag', 'osea-theme' ),
			'add_new_item' => __( 'Add New Custom Tag', 'osea-theme' ),
			'new_item_name' => __( 'New Custom Tag Name', 'osea-theme' )
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
); 



