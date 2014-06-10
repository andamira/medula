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
			'name' => __( 'Custom Categories', 'andamira-osea' ),
			'singular_name' => __( 'Custom Category', 'andamira-osea' ),
			'search_items' =>  __( 'Search Custom Categories', 'andamira-osea' ),
			'all_items' => __( 'All Custom Categories', 'andamira-osea' ),
			'parent_item' => __( 'Parent Custom Category', 'andamira-osea' ),
			'parent_item_colon' => __( 'Parent Custom Category:', 'andamira-osea' ),
			'edit_item' => __( 'Edit Custom Category', 'andamira-osea' ),
			'update_item' => __( 'Update Custom Category', 'andamira-osea' ),
			'add_new_item' => __( 'Add New Custom Category', 'andamira-osea' ),
			'new_item_name' => __( 'New Custom Category Name', 'andamira-osea' )
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
			'name' => __( 'Custom Tags', 'andamira-osea' ),
			'singular_name' => __( 'Custom Tag', 'andamira-osea' ),
			'search_items' =>  __( 'Search Custom Tags', 'andamira-osea' ),
			'all_items' => __( 'All Custom Tags', 'andamira-osea' ),
			'parent_item' => __( 'Parent Custom Tag', 'andamira-osea' ),
			'parent_item_colon' => __( 'Parent Custom Tag:', 'andamira-osea' ),
			'edit_item' => __( 'Edit Custom Tag', 'andamira-osea' ),
			'update_item' => __( 'Update Custom Tag', 'andamira-osea' ),
			'add_new_item' => __( 'Add New Custom Tag', 'andamira-osea' ),
			'new_item_name' => __( 'New Custom Tag Name', 'andamira-osea' )
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
); 


?>
