<?php

/** WP Custom Post Type Class :: https://github.com/jjgrainger/wp-custom-post-type-class/ **/


// Example #1 -----------------------------------

$post_types['subjects'] = array(
    'post_type_name' => 'subjects',
    'post_type_args' => array(
        'labels' => array(
            'name' => __('Subjects'),
            'singular_name' => __('Subject'),
            'menu_name' => __('Subjects'),
            'all_items' => __('All Subjects'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'subjects'),
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
            'name' => __('Scopes'),
            'singular_name' => __('Scope'),
            'search_items' => __('Search Scopes'),
            'all_items' => __('All Scopes'),
            'parent_item' => __('Parent Scope'),
            'parent_item_colon' => __('Parent Scope:'),
            'edit_item' => __('Edit Scope'),
            'update_item' => __('Update Scope'),
            'add_new_item' => __('Add New Scope'),
            'new_item_name' => __('New Scope Name'),
            'menu_name' => __('Scopes'),
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => false,
    )
);