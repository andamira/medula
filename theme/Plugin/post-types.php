<?php
/*
 * Custom Post Types (CPT) Template File
 *
 * Here you can write your own custom post types. You can
 * copy the example as a model, or use a {@link http://generatewp.com/post-type/ generator}
 */

function custom_post_example() { 

	register_post_type( 'CPT', 
		array( 'labels' => array(
			'name' => __( 'Custom Types', 'medula-theme' ),
			'singular_name' => __( 'Custom Post', 'medula-theme' ),
			'all_items' => __( 'All Custom Posts', 'medula-theme' ),
			'add_new' => __( 'Add New', 'medula-theme' ),
			'add_new_item' => __( 'Add New Custom Type', 'medula-theme' ),
			'edit' => __( 'Edit', 'medula-theme' ),
			'edit_item' => __( 'Edit Post Types', 'medula-theme' ),
			'new_item' => __( 'New Post Type', 'medula-theme' ),
			'view_item' => __( 'View Post Type', 'medula-theme' ),
			'search_items' => __( 'Search Post Type', 'medula-theme' ),
			'not_found' =>  __( 'Nothing found in the Database.', 'medula-theme' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'medula-theme' ),
			'parent_item_colon' => ''
			),

			'description' => __( 'This is the example custom post type', 'medula-theme' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, // this is what order you want it to appear in on the left hand side menu

			// For the icon you can use an image or an icon font ( http://melchoyce.github.io/dashicons/ )
			'menu_icon' => 'dashicons-smiley',											// e.g. icon font
			//'menu_icon' => get_stylesheet_directory_uri() . '/img/favicon.png',	// e.g. icon image
			
			'rewrite'	=> array( 'slug' => 'CPT', 'with_front' => false ),
			'has_archive' => 'CPT',
			'capability_type' => 'post',
			'hierarchical' => false,
			// the next line tells what's enabled in the post editor
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	)
	);
	// Here you can add your post categories and tags to your custom post type
	register_taxonomy_for_object_type( 'category', 'CPT' );
	register_taxonomy_for_object_type( 'post_tag', 'CPT' );
} 
add_action( 'init', 'custom_post_example');
	




