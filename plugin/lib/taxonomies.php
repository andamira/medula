<?php
 /**
 * Here you can write your own custom taxonomies. You can
 * copy the example as a model, or use a {@link http://generatewp.com/taxonomy/ generator}
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function custom_category_example() {
	$labels = array(
		'name'                       => _x( 'Custom Categories', 'Taxonomy General Name', 'medula-plugin' ),
		'singular_name'              => _x( 'Custom Category', 'Taxonomy Singular Name', 'medula-plugin' ),
		'menu_name'                  => __( 'Custom Category', 'medula-plugin' ),
		'all_items'                  => __( 'All Custom Categories', 'medula-plugin' ),
		'parent_item'                => __( 'Parent Custom Category', 'medula-plugin' ),
		'parent_item_colon'          => __( 'Parent Custom Category:', 'medula-plugin' ),
		'new_item_name'              => __( 'New Custom Category Name', 'medula-plugin' ),
		'add_new_item'               => __( 'Add New Custom Category', 'medula-plugin' ),
		'edit_item'                  => __( 'Edit Custom Category', 'medula-plugin' ),
		'update_item'                => __( 'Update Custom Category', 'medula-plugin' ),
		'separate_items_with_commas' => __( 'Separate Custom Categories with commas', 'medula-plugin' ),
		'search_items'               => __( 'Search Custom Categories', 'medula-plugin' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Categories', 'medula-plugin' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Categories', 'medula-plugin' ),
		'not_found'                  => __( 'Not Found', 'medula-plugin' ),
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
	register_taxonomy( 'CTCAT', array( 'CPT' ), $args );
}
add_action( 'init', 'custom_category_example', 0 );


function custom_tag_example() {
	$labels = array(
		'name'                       => _x( 'Custom Tags', 'Taxonomy General Name', 'medula-plugin' ),
		'singular_name'              => _x( 'Custom Tag', 'Taxonomy Singular Name', 'medula-plugin' ),
		'menu_name'                  => __( 'Custom Tag', 'medula-plugin' ),
		'all_items'                  => __( 'All Custom Tags', 'medula-plugin' ),
		'parent_item'                => __( 'Parent Custom Tag', 'medula-plugin' ),
		'parent_item_colon'          => __( 'Parent Custom Tag:', 'medula-plugin' ),
		'new_item_name'              => __( 'New Custom Category Name', 'medula-plugin' ),
		'add_new_item'               => __( 'Add New Custom Tag', 'medula-plugin' ),
		'edit_item'                  => __( 'Edit Custom Tag', 'medula-plugin' ),
		'update_item'                => __( 'Update Custom Tag', 'medula-plugin' ),
		'separate_items_with_commas' => __( 'Separate Custom Tags with commas', 'medula-plugin' ),
		'search_items'               => __( 'Search Custom Tags', 'medula-plugin' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Tags', 'medula-plugin' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Tags', 'medula-plugin' ),
		'not_found'                  => __( 'Not Found', 'medula-plugin' ),
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
	register_taxonomy( 'CTTAG', array( 'CPT' ), $args );
}
add_action( 'init', 'custom_tag_example', 0 );


