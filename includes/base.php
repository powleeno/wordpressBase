<?php


// Helpers
require_once 'base/helpers.php';


// Shortcodes
require_once 'base/shortcodes.php';


function base_after_setup_theme_hook()
{
	// Menus
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu', 'menus'),
			'footer-menu' => __('Footer Menu', 'menus'),
			'mobile-menu' => __('Mobile Menu', 'menus'),
		)
	);

	// Thumbnails
	add_theme_support('post-thumbnails');
	// Image Size Names: left out for lack of any actual use
	// add_image_size('300x300', 300, 300, true);
	// add_image_size('450x450', 450, 450, true);
	// add_filter('image_size_names_choose', 'image_size_names');
	// function image_size_names($sizes)
	// {
	//     return array_merge($sizes, array(
	//         '300x300' => __('Thumbnail Medium', 'thumbnails'),
	//         '450x450' => __('Thumbnail Large', 'thumbnails'),
	//     ));
	// }
}

add_action('after_setup_theme', 'base_after_setup_theme_hook');


function base_init_hook()
{
	// Variables session start
	if (!session_id()) {
		session_start();
	}

	// Custom Meta Boxes
	if (!class_exists('CMB2_Bootstrap_208')) {
		require_once('vendor/custom-meta-boxes/init.php');
		require_once 'base/custom-meta-boxes.php';
		add_filter('cmb2_meta_boxes', 'set_custom_meta_boxes');
		base_remove_templates_support();
	}

	// Custom Post Types
	if (!class_exists('CPT')) {
		require_once('vendor/custom-post-types/CPT.php');
		require_once 'base/custom-post-types.php';
		base_set_custom_post_types();
	}

	// Media Taxonomies
	register_taxonomy_for_object_type('category', 'attachment');
	register_taxonomy_for_object_type('post_tag', 'attachment');
}

add_action('init', 'base_init_hook');


function base_get_header_hook()
{
	// Remove Admin-Bar
	add_filter('show_admin_bar', '__return_false');
	remove_action('wp_head', '_admin_bar_bump_cb');

	// Remove Wordpress version
	remove_action('wp_head', 'wp_generator');

	// Remove link to the Windows Live Writer manifest file
	remove_action('wp_head', 'wlwmanifest_link');
	// Remove link to the Really Simple Discovery service endpoint, EditURI link
	remove_action('wp_head', 'rsd_link');
	// Remove the links to the general feeds: Post and Comment Feed
	remove_action('wp_head', 'feed_links');
	// Remove the links to the extra feeds such as category feeds
	remove_action('wp_head', 'feed_links_extra');
	// Remove index link
	remove_action('wp_head', 'index_rel_link');
	// Remove prev link
	remove_action('wp_head', 'parent_post_rel_link');
	// Remove start link
	remove_action('wp_head', 'start_post_rel_link');
	// Remove relational links for the posts adjacent to the current post.
	remove_action('wp_head', 'adjacent_posts_rel_link');
	// Remove shortlink
	remove_action('wp_head', 'wp_shortlink_wp_head');
}

add_action('get_header', 'base_get_header_hook');


function base_wp_enqueue_scripts_hook()
{
	//  Custom Stylesheet
	wp_register_style('custom_stylesheet', get_template_directory_uri() . '/css/base.css');
	wp_enqueue_style('custom_stylesheet');

	// Google Fonts
	wp_register_style('google_font_roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic');
	wp_enqueue_style('google_font_roboto');
	wp_register_style('google_font_roboto_slab', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');
	wp_enqueue_style('google_font_roboto_slab');
	wp_register_style('google_font_roboto_mono', 'http://fonts.googleapis.com/css?family=Roboto+Mono:400,300,300italic,400italic,700,700italic');
	wp_enqueue_style('google_font_roboto_mono');

	// Scripts
	require_once 'base/scripts.php';
	base_load_scripts();

}

add_action('wp_enqueue_scripts', 'base_wp_enqueue_scripts_hook');


function base_wp_login_hook()
{
	// Variables session end
	session_destroy();
}

add_action('wp_logout', 'base_wp_login_hook');


function base_wp_logout_hook()
{
	// Variables session end
	session_destroy();
}

add_action('wp_logout', 'base_wp_logout_hook');


// Disable auto updates
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');
add_filter('auto_update_core', '__return_false');
add_filter('automatic_updater_disabled', '__return_true');