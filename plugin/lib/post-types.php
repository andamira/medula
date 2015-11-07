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
			'name' => __( 'Custom Types', 'medula-p' ),
			'singular_name' => __( 'Custom Post', 'medula-p' ),
			'all_items' => __( 'All Custom Posts', 'medula-p' ),
			'add_new' => __( 'Add New', 'medula-p' ),
			'add_new_item' => __( 'Add New Custom Type', 'medula-p' ),
			'edit' => __( 'Edit', 'medula-p' ),
			'edit_item' => __( 'Edit Post Types', 'medula-p' ),
			'new_item' => __( 'New Post Type', 'medula-p' ),
			'view_item' => __( 'View Post Type', 'medula-p' ),
			'search_items' => __( 'Search Post Type', 'medula-p' ),
			'not_found' =>  __( 'Nothing found in the Database.', 'medula-p' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'medula-p' ),
			'parent_item_colon' => ''
			),

			'description' => __( 'This is the example custom post type', 'medula-p' ),
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
	




