<?php
 /**
 * Here you can write your own custom taxonomies. You can
 * copy the example as a model, or use a {@link http://generatewp.com/taxonomy/ generator}
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function custom_category_example() {
	$labels = array(
		'name'                       => _x( 'Custom Categories', 'Taxonomy General Name', 'medula-theme' ),
		'singular_name'              => _x( 'Custom Category', 'Taxonomy Singular Name', 'medula-theme' ),
		'menu_name'                  => __( 'Custom Category', 'medula-theme' ),
		'all_items'                  => __( 'All Custom Categories', 'medula-theme' ),
		'parent_item'                => __( 'Parent Custom Category', 'medula-theme' ),
		'parent_item_colon'          => __( 'Parent Custom Category:', 'medula-theme' ),
		'new_item_name'              => __( 'New Custom Category Name', 'medula-theme' ),
		'add_new_item'               => __( 'Add New Custom Category', 'medula-theme' ),
		'edit_item'                  => __( 'Edit Custom Category', 'medula-theme' ),
		'update_item'                => __( 'Update Custom Category', 'medula-theme' ),
		'separate_items_with_commas' => __( 'Separate Custom Categories with commas', 'medula-theme' ),
		'search_items'               => __( 'Search Custom Categories', 'medula-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Categories', 'medula-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Categories', 'medula-theme' ),
		'not_found'                  => __( 'Not Found', 'medula-theme' ),
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
add_action( 'init', 'custom_category_example', 0 );


function custom_tag_example() {
	$labels = array(
		'name'                       => _x( 'Custom Tags', 'Taxonomy General Name', 'medula-theme' ),
		'singular_name'              => _x( 'Custom Tag', 'Taxonomy Singular Name', 'medula-theme' ),
		'menu_name'                  => __( 'Custom Tag', 'medula-theme' ),
		'all_items'                  => __( 'All Custom Tags', 'medula-theme' ),
		'parent_item'                => __( 'Parent Custom Tag', 'medula-theme' ),
		'parent_item_colon'          => __( 'Parent Custom Tag:', 'medula-theme' ),
		'new_item_name'              => __( 'New Custom Category Name', 'medula-theme' ),
		'add_new_item'               => __( 'Add New Custom Tag', 'medula-theme' ),
		'edit_item'                  => __( 'Edit Custom Tag', 'medula-theme' ),
		'update_item'                => __( 'Update Custom Tag', 'medula-theme' ),
		'separate_items_with_commas' => __( 'Separate Custom Tags with commas', 'medula-theme' ),
		'search_items'               => __( 'Search Custom Tags', 'medula-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Tags', 'medula-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Tags', 'medula-theme' ),
		'not_found'                  => __( 'Not Found', 'medula-theme' ),
	);
	$rewrite = array(
		'slug'                       => 'custom-slug',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,	// < this makes it a 'tag'
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'custom_tag', array( 'custom_type' ), $args );
}
add_action( 'init', 'custom_tag_example', 0 );


/*
// add custom tag
register_taxonomy( 'custom_tag', 
	array('custom_type'),
	array('hierarchical' => false,
		'labels' => array(
			'name' => __( 'Custom Tags', 'medula-theme' ),
			'singular_name' => __( 'Custom Tag', 'medula-theme' ),
			'search_items' =>  __( 'Search Custom Tags', 'medula-theme' ),
			'all_items' => __( 'All Custom Tags', 'medula-theme' ),
			'parent_item' => __( 'Parent Custom Tag', 'medula-theme' ),
			'parent_item_colon' => __( 'Parent Custom Tag:', 'medula-theme' ),
			'edit_item' => __( 'Edit Custom Tag', 'medula-theme' ),
			'update_item' => __( 'Update Custom Tag', 'medula-theme' ),
			'add_new_item' => __( 'Add New Custom Tag', 'medula-theme' ),
			'new_item_name' => __( 'New Custom Tag Name', 'medula-theme' )
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
); 
/**/


