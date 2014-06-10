<?php
/*
 * Shortcodes Template File
 *
 * Here you can write your own custom post types. You can
 * copy the example as a model, or use a generator like:
 * Generator: http://generatewp.com/post-type/
 *
 */

function custom_post_example() { 

	register_post_type( 'custom_type', 
		array( 'labels' => array(
			'name' => __( 'Custom Types', 'andamira-osea' ),
			'singular_name' => __( 'Custom Post', 'andamira-osea' ),
			'all_items' => __( 'All Custom Posts', 'andamira-osea' ),
			'add_new' => __( 'Add New', 'andamira-osea' ),
			'add_new_item' => __( 'Add New Custom Type', 'andamira-osea' ),
			'edit' => __( 'Edit', 'andamira-osea' ),
			'edit_item' => __( 'Edit Post Types', 'andamira-osea' ),
			'new_item' => __( 'New Post Type', 'andamira-osea' ),
			'view_item' => __( 'View Post Type', 'andamira-osea' ),
			'search_items' => __( 'Search Post Type', 'andamira-osea' ),
			'not_found' =>  __( 'Nothing found in the Database.', 'andamira-osea' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'andamira-osea' ),
			'parent_item_colon' => ''
			),

			'description' => __( 'This is the example custom post type', 'andamira-osea' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, // this is what order you want it to appear in on the left hand side menu

			// For the icon you can use an image or an icon font ( http://melchoyce.github.io/dashicons/ )
			'menu_icon' => 'dashicons-smiley',											// icon font
			//'menu_icon' => get_stylesheet_directory_uri() . '/lib/img/favicon.png',	// icon image
			
			'rewrite'	=> array( 'slug' => 'custom_type', 'with_front' => false ),
			'has_archive' => 'custom_type',
			'capability_type' => 'post',
			'hierarchical' => false,
			// the next line tells what's enabled in the post editor
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	)
	);
	// Here you can add your post categories and tags to your custom post type
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
} 
add_action( 'init', 'custom_post_example');
	





?>
