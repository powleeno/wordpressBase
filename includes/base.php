<?php


// Helpers
require_once 'base/helpers.php';



// WPML support functions
require_once 'base/wpml-support.php';



// Shortcodes
require_once 'base/shortcodes.php';



function base_after_setup_theme_hook()
{
	// Menus
	register_nav_menus(
		array(
			'base_menu_header' => __('Header Menu', 'menus'),
			'base_menu_footer' => __('Footer Menu', 'menus'),
			'base_menu_mobile' => __('Mobile Menu', 'menus'),
		)
	);

	// Custom Navigation Walker
	if (!class_exists('top_bar_walker')) {
		require_once('vendor/top-bar-walker/top_bar_walker.php');
	}

	// Thumbnail support
	base_thumbnail_support();
}

add_action('after_setup_theme', 'base_after_setup_theme_hook');



function base_init_hook()
{
	// Session variables start
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

	// Register Media taxonomies
	base_register_media_taxonomies();
}

add_action('init', 'base_init_hook');



function base_get_header_hook()
{
	// Remove admin-bar
	base_remove_admin_bar();

	// Remove Wordpress version
	base_remove_wordpress_version();

	// Remove header links
	base_remove_header_links();
}

add_action('get_header', 'base_get_header_hook');



function base_wp_enqueue_scripts_hook()
{
	//  Custom Stylesheet
	wp_register_style('base_stylesheet', get_template_directory_uri() . '/css/base.css');
	wp_enqueue_style('base_stylesheet');

	// Google Fonts
	require_once 'base/google-fonts.php';
	base_load_google_fonts();

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
base_disable_auto_updates();