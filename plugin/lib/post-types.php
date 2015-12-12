<?php
/*
 * Custom Post Types (CPT) Template File
 *
 * Here you can write your own custom post types. You can
 * copy the example as a model, or use a {@link http://generatewp.com/post-type/ generator}.
 */

function andamira_p_custom_post_types() {

	$labels = array(
		'name'                  => __( 'Custom Types', 'medulap' ),
		'singular_name'         => __( 'Custom Post', 'medulap' ),
		'menu_name'             => __( 'Custom Post', 'medulap' ),
		'name_admin_bar'        => __( 'Custom Post', 'medulap' ),
		'parent_item_colon'     => __( 'Parent Item', 'medulap' ),
		'all_items'             => __( 'All Custom Posts', 'medulap' ),
		'add_new_item'          => __( 'Add New Custom Type', 'medulap' ),
		'add_new'               => __( 'Add New', 'medulap' ),
		'new_item'              => __( 'New Post Type', 'medulap' ),
		'edit_item'             => __( 'Edit Post Types', 'medulap' ),
		'update_item'           => __( 'Update Item', 'medulap' ),
		'view_item'             => __( 'View Post Type', 'medulap' ),
		'search_items'          => __( 'Search Post Type', 'medulap' ),
		'not_found'             => __( 'Nothing found in the Database.', 'medulap' ),
		'not_found_in_trash'    => __( 'Nothing found in Trash', 'medulap' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);

	$args = array(
		'label'                 => __( 'Post Type', 'text_domain' ),
		'description'           => __( 'This is the example custom post type', 'medulap' ),
		'labels'                => $labels,
		'supports'              => array( ),
		// 'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'CPT',
		'publicly_queryable'    => true,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',

		'query_var'             => true,

		// For the icon you can use an image or an icon font ( https://developer.wordpress.org/resource/dashicons/ )
		'menu_icon'           => 'dashicons-smiley',
		//'menu_icon'         => '../res/img/icon.png',
		
		'rewrite'             => array( 'slug' => 'CPT', 'with_front' => false ),

		// the next line tells what's enabled in the post editor
	);

	register_post_type( 'CPT', $args);
}
add_action( 'init', 'andamira_p_custom_post_types');

