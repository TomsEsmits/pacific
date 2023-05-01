<?php

/**
 * Class responsible for most hooks.
 */
class Pacific_Custom_Hooks {
	public function __construct() {
		add_action( 'init', [$this, 'generate_custom_cpt'] );
		add_action( 'init', [$this, 'generate_custom_taxonomy'] );
		add_action( 'after_theme_setup', [$this, 'image_sizes'] );
	}

	/**
	 * Example of generating a Custom Post Type.
	 */
	public function generate_custom_cpt()
	{
		$labels = array(
			'name'                  => _x( 'Services', 'Post Type General Name', 'pacific' ),
			'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'pacific' ),
			'menu_name'             => __( 'Services', 'pacific' ),
			'name_admin_bar'        => __( 'Services', 'pacific' ),
			'archives'              => __( 'Services Archives', 'pacific' ),
			'attributes'            => __( 'Services Attributes', 'pacific' ),
			'parent_item_colon'     => __( 'Parent Item:', 'pacific' ),
			'all_items'             => __( 'All Services', 'pacific' ),
			'add_new_item'          => __( 'Add New Item', 'pacific' ),
			'add_new'               => __( 'Add New', 'pacific' ),
			'new_item'              => __( 'New Item', 'pacific' ),
			'edit_item'             => __( 'Edit Item', 'pacific' ),
			'update_item'           => __( 'Update Item', 'pacific' ),
			'view_item'             => __( 'View Item', 'pacific' ),
			'view_items'            => __( 'View Items', 'pacific' ),
			'search_items'          => __( 'Search Item', 'pacific' ),
			'not_found'             => __( 'Not found', 'pacific' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'pacific' ),
			'featured_image'        => __( 'Featured Image', 'pacific' ),
			'set_featured_image'    => __( 'Set featured image', 'pacific' ),
			'remove_featured_image' => __( 'Remove featured image', 'pacific' ),
			'use_featured_image'    => __( 'Use as featured image', 'pacific' ),
			'insert_into_item'      => __( 'Insert into item', 'pacific' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'pacific' ),
			'items_list'            => __( 'Items list', 'pacific' ),
			'items_list_navigation' => __( 'Items list navigation', 'pacific' ),
			'filter_items_list'     => __( 'Filter items list', 'pacific' ),
		);
		$args = array(
			'label'                 => __( 'Services', 'pacific' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'           	=> 'dashicons-hammer',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'Services', $args );

		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'pacific' ),
			'singular_name'         => _x( 'Projects', 'Post Type Singular Name', 'pacific' ),
			'menu_name'             => __( 'Projects', 'pacific' ),
			'name_admin_bar'        => __( 'Projects', 'pacific' ),
			'archives'              => __( 'Projects Archives', 'pacific' ),
			'attributes'            => __( 'Projects Attributes', 'pacific' ),
			'parent_item_colon'     => __( 'Parent Item:', 'pacific' ),
			'all_items'             => __( 'All Projects', 'pacific' ),
			'add_new_item'          => __( 'Add New Item', 'pacific' ),
			'add_new'               => __( 'Add New', 'pacific' ),
			'new_item'              => __( 'New Item', 'pacific' ),
			'edit_item'             => __( 'Edit Item', 'pacific' ),
			'update_item'           => __( 'Update Item', 'pacific' ),
			'view_item'             => __( 'View Item', 'pacific' ),
			'view_items'            => __( 'View Items', 'pacific' ),
			'search_items'          => __( 'Search Item', 'pacific' ),
			'not_found'             => __( 'Not found', 'pacific' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'pacific' ),
			'featured_image'        => __( 'Featured Image', 'pacific' ),
			'set_featured_image'    => __( 'Set featured image', 'pacific' ),
			'remove_featured_image' => __( 'Remove featured image', 'pacific' ),
			'use_featured_image'    => __( 'Use as featured image', 'pacific' ),
			'insert_into_item'      => __( 'Insert into item', 'pacific' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'pacific' ),
			'items_list'            => __( 'Items list', 'pacific' ),
			'items_list_navigation' => __( 'Items list navigation', 'pacific' ),
			'filter_items_list'     => __( 'Filter items list', 'pacific' ),
		);
		$args = array(
			'label'                 => __( 'Projects', 'pacific' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'           	=> 'dashicons-paperclip',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'Projects', $args );
	}

	/**
	 * Generating a Custom Taxonomies.
	 */
	public function generate_custom_taxonomy()
	{
		// Custom taxonomy for News posts
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'pacific' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'pacific' ),
			'menu_name'                  => __( 'Category', 'pacific' ),
			'all_items'                  => __( 'All Categories', 'pacific' ),
			'parent_item'                => __( 'Parent Category', 'pacific' ),
			'parent_item_colon'          => __( 'Parent Category:', 'pacific' ),
			'new_item_name'              => __( 'New Category Name', 'pacific' ),
			'add_new_item'               => __( 'Add New Category', 'pacific' ),
			'edit_item'                  => __( 'Edit Category', 'pacific' ),
			'update_item'                => __( 'Update Category', 'pacific' ),
			'view_item'                  => __( 'View Category', 'pacific' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'pacific' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'pacific' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'pacific' ),
			'popular_items'              => __( 'Popular Categories', 'pacific' ),
			'search_items'               => __( 'Search Categories', 'pacific' ),
			'not_found'                  => __( 'Not Found', 'pacific' ),
			'no_terms'                   => __( 'No categories', 'pacific' ),
			'items_list'                 => __( 'Categories list', 'pacific' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'pacific' ),
		);
		$args = array(
			'labels'                    => $labels,
			'rewrite'            	  		=> array('slug' => 'projects-category'),
			'hierarchical'              => true,
			'public' 										=> false,
			'show_ui' 									=> true,
			'show_in_rest' 							=> true,
			'show_admin_column' 				=> true,
			'query_var' 								=> true,
		);

		register_taxonomy( 'projects_cat', array( 'projects' ), $args );
	}

	public function image_sizes() {
		add_image_size( 'project', 384, 384, true );
	}
}

new Pacific_Custom_Hooks();