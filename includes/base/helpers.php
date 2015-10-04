<?php


// SESSION VARIABLES -----------------------------------------------------

function base_set_session_variables($base_session_variable_label, $base_session_variable_value)
{
	if (!isset($_SESSION[$base_session_variable_label])) {
		$_SESSION[$base_session_variable_label] = $base_session_variable_value;
	}
}


// THUMBNAIL SUPPORT -----------------------------------------------------

function base_add_thumbnail_support()
{
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


// REGISTER MEDIA TAXONOMIES ---------------------------------------------

function base_register_media_taxonomies()
{
	register_taxonomy_for_object_type('category', 'attachment');
	register_taxonomy_for_object_type('post_tag', 'attachment');
}


// FIELD PREFIXES --------------------------------------------------------

function base_fields_prefix()
{
	$base_fields_prefix = '_base_';
	return $base_fields_prefix;
}


// WORDPRESS FEATURES REMOVAL --------------------------------------------

function base_remove_admin_bar()
{
	add_filter('show_admin_bar', '__return_false');
	remove_action('wp_head', '_admin_bar_bump_cb');
}

function base_remove_version()
{
	remove_action('wp_head', 'wp_generator');
}

function base_remove_header_links()
{
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


// DISABLE AUTO UPDATES --------------------------------------------------

function base_disable_auto_updates()
{
	add_filter('auto_update_plugin', '__return_false');
	add_filter('auto_update_theme', '__return_false');
	add_filter('auto_update_core', '__return_false');
	add_filter('automatic_updater_disabled', '__return_true');
}
