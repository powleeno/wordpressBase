<?php

/** WP Custom Post Type Class :: https://github.com/jjgrainger/wp-custom-post-type-class/ **/


// Example #1 -----------------------------------

$base_post_types['subjects'] = array(
	'post_type_name' => 'subjects',
	'post_type_args' => array(
		'labels' => array(
			'name' => __('Subjects', 'custom post types'),
			'singular_name' => __('Subject', 'custom post types'),
			'menu_name' => __('Subjects', 'custom post types'),
			'name_admin_bar' => __('Subject', 'custom post types'),
			'add_new' => __('Add New', 'custom post types'),
			'add_new_item' => __('Add New Subject', 'custom post types'),
			'new_item' => __('New Subject', 'custom post types'),
			'edit_item' => __('Edit Subject', 'custom post types'),
			'view_item' => __('View Subject', 'custom post types'),
			'all_items' => __('All Subjects', 'custom post types'),
			'search_items' => __('Search Subjects', 'custom post types'),
			'parent_item_colon' => __('Parent Subjects:', 'custom post types'),
			'not_found' => __('No Subjects found.', 'custom post types'),
			'not_found_in_trash' => __('No Subjects found in Trash.', 'custom post types')
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => __('subjects', 'custom post types')),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-lightbulb', // http://developer.wordpress.org/resource/dashicons/
		'supports' => array('title', 'thumbnail', 'page-attributes'),
	),
	'taxonomy_name' => 'scope',
	'taxonomy_args' => array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Scopes', 'custom post types'),
			'singular_name' => __('Scope', 'custom post types'),
			'search_items' => __('Search Scopes', 'custom post types'),
			'popular_items' => __('Popular Scopes', 'custom post types'),
			'all_items' => __('All Scopes', 'custom post types'),
			'parent_item' => __('Parent Scope', 'custom post types'),
			'parent_item_colon' => __('Parent Scope:', 'custom post types'),
			'edit_item' => __('Edit Scope', 'custom post types'),
			'update_item' => __('Update Scope', 'custom post types'),
			'add_new_item' => __('Add New Scope', 'custom post types'),
			'new_item_name' => __('New Scope Name', 'custom post types'),
			'separate_items_with_commas' => __('Separate scopes with commas', 'custom post types'),
			'add_or_remove_items' => __('Add or remove scopes', 'custom post types'),
			'choose_from_most_used' => __('Choose from the most used scopes', 'custom post types'),
			'not_found' => __('No scopes found.', 'custom post types'),
			'menu_name' => __('Scopes', 'custom post types'),
		),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => false,
	)
);


// Example #2 -----------------------------------

$base_post_types['locations'] = array(
	'post_type_name' => 'locations',
	'post_type_args' => array(
		'labels' => array(
			'name' => __('Locations', 'custom post types'),
			'singular_name' => __('Location', 'custom post types'),
			'menu_name' => __('Locations', 'custom post types'),
			'name_admin_bar' => __('Location', 'custom post types'),
			'add_new' => __('Add New', 'custom post types'),
			'add_new_item' => __('Add New Location', 'custom post types'),
			'new_item' => __('New Location', 'custom post types'),
			'edit_item' => __('Edit Location', 'custom post types'),
			'view_item' => __('View Location', 'custom post types'),
			'all_items' => __('All Locations', 'custom post types'),
			'search_items' => __('Search Locations', 'custom post types'),
			'parent_item_colon' => __('Parent Locations:', 'custom post types'),
			'not_found' => __('No Locations found.', 'custom post types'),
			'not_found_in_trash' => __('No Locations found in Trash.', 'custom post types')
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => __('locations', 'custom post types')),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-location', // http://developer.wordpress.org/resource/dashicons/
		'supports' => array('title', 'thumbnail', 'page-attributes'),
	),
	'taxonomy_name' => 'marker',
	'taxonomy_args' => array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Markers', 'custom post types'),
			'singular_name' => __('Marker', 'custom post types'),
			'search_items' => __('Search Markers', 'custom post types'),
			'popular_items' => __('Popular Markers', 'custom post types'),
			'all_items' => __('All Markers', 'custom post types'),
			'parent_item' => __('Parent Marker', 'custom post types'),
			'parent_item_colon' => __('Parent Marker:', 'custom post types'),
			'edit_item' => __('Edit Marker', 'custom post types'),
			'update_item' => __('Update Marker', 'custom post types'),
			'add_new_item' => __('Add New Marker', 'custom post types'),
			'new_item_name' => __('New Marker Name', 'custom post types'),
			'separate_items_with_commas' => __('Separate markers with commas', 'custom post types'),
			'add_or_remove_items' => __('Add or remove markers', 'custom post types'),
			'choose_from_most_used' => __('Choose from the most used markers', 'custom post types'),
			'not_found' => __('No markers found.', 'custom post types'),
			'menu_name' => __('Markers', 'custom post types'),
		),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => false,
	)
);