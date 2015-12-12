<?php
 /**
 * Here you can write your own Custom Taxonomies.
 *
 *
 *     1 Examples
 *
 *         1.1 Custom Category
 *         1.2 Custom Tag
 *
 *     2 ...
 *
 *
 * @link https://developer.wordpress.org/plugins/taxonomy/working-with-custom-taxonomies/
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @link http://generatewp.com/taxonomy/
 */


/**
 * 1 EXAMPLES
 * ************************************************************
 */

/**
 * 1.1 CUSTOM CATEGORY EXAMPLE
 */

add_action( 'init', 'custom_category_example', 0 );

function custom_category_example() {
	$labels = array(
		'name'                       => _x( 'Custom Categories', 'Taxonomy General Name', 'medulap' ),
		'singular_name'              => _x( 'Custom Category', 'Taxonomy Singular Name', 'medulap' ),
		'menu_name'                  => __( 'Custom Category', 'medulap' ),
		'all_items'                  => __( 'All Custom Categories', 'medulap' ),
		'parent_item'                => __( 'Parent Custom Category', 'medulap' ),
		'parent_item_colon'          => __( 'Parent Custom Category:', 'medulap' ),
		'new_item_name'              => __( 'New Custom Category Name', 'medulap' ),
		'add_new_item'               => __( 'Add New Custom Category', 'medulap' ),
		'edit_item'                  => __( 'Edit Custom Category', 'medulap' ),
		'update_item'                => __( 'Update Custom Category', 'medulap' ),
		'separate_items_with_commas' => __( 'Separate Custom Categories with commas', 'medulap' ),
		'search_items'               => __( 'Search Custom Categories', 'medulap' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Categories', 'medulap' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Categories', 'medulap' ),
		'not_found'                  => __( 'Not Found', 'medulap' ),
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

/**
 * 1.2 CUSTOM TAG EXAMPLE
 */

add_action( 'init', 'custom_tag_example', 0 );

function custom_tag_example() {
	$labels = array(
		'name'                       => _x( 'Custom Tags', 'Taxonomy General Name', 'medulap' ),
		'singular_name'              => _x( 'Custom Tag', 'Taxonomy Singular Name', 'medulap' ),
		'menu_name'                  => __( 'Custom Tag', 'medulap' ),
		'all_items'                  => __( 'All Custom Tags', 'medulap' ),
		'parent_item'                => __( 'Parent Custom Tag', 'medulap' ),
		'parent_item_colon'          => __( 'Parent Custom Tag:', 'medulap' ),
		'new_item_name'              => __( 'New Custom Category Name', 'medulap' ),
		'add_new_item'               => __( 'Add New Custom Tag', 'medulap' ),
		'edit_item'                  => __( 'Edit Custom Tag', 'medulap' ),
		'update_item'                => __( 'Update Custom Tag', 'medulap' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Custom Tags with commas', 'medulap' ),
		'add_or_remove_items'        => __( 'Add or remove Custom Tags', 'medulap' ),
		'choose_from_most_used'      => __( 'Choose from the most used Custom Tags', 'medulap' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Custom Tags', 'medulap' ),
		'not_found'                  => __( 'Not Found', 'medulap' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'custom-slug',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false, // < this makes it a 'tag'
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	//	'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'CTTAG', array( 'CPT' ), $args );
}


/**
 * 2 ...
 * ************************************************************
 */


