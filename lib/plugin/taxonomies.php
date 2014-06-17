<?php
 /*
 * Here you can write your own custom taxonomies. You can
 * copy the example as a model, or use a generator like:
 * Generator: http://generatewp.com/taxonomy/
 *
 * Codex: http://codex.wordpress.org/Function_Reference/register_taxonomy
 */



function custom_category() {
	$labels = array(
		'name'                       => _x( 'Custom Categories', 'Taxonomy General Name', 'osea-theme' ),
		'singular_name'              => _x( 'Custom Category', 'Taxonomy Singular Name', 'osea-theme' ),
		'menu_name'                  => __( 'Custom Category', 'osea-theme' ),
		'all_items'                  => __( 'All Custom Categories', 'osea-theme' ),
		'parent_item'                => __( 'Parent Custom Category', 'osea-theme' ),
		'parent_item_colon'          => __( 'Parent Custom Category:', 'osea-theme' ),
		'new_item_name'              => __( 'New Custom Category Name', 'osea-theme' ),
		'add_new_item'               => __( 'Add New Custom Category', 'osea-theme' ),
		'edit_item'                  => __( 'Edit Item', 'osea-theme' ),
		'update_item'                => __( 'Update Item', 'osea-theme' ),
		'separate_items_with_commas' => __( 'Separate Custom Categories with commas', 'osea-theme' ),
		'search_items'               => __( 'Search Custom Categories', 'osea-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Categories', 'osea-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Categories', 'osea-theme' ),
		'not_found'                  => __( 'Not Found', 'osea-theme' ),
	);
	$rewrite = array(
		'slug'                       => 'custom-slug',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,	// < this makes it a 'category'
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'custom_cat', array( 'custom_type' ), $args );
}
add_action( 'init', 'custom_category', 0 );



/*
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
/**/


