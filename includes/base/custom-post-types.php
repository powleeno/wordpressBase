<?php


/** WP Custom Post Type Class :: https://github.com/jjgrainger/wp-custom-post-type-class/ **/


function base_set_custom_post_types()
{
	$base_post_types = array();

	/*
	 *
	 * Left empty : populate after examples library
	 *
	 */

	if (!empty($base_post_types)) {
		foreach ($base_post_types as $base_post_type) {
			// Register post type
			if (!empty($base_post_type['post_type_name']) && !empty($base_post_type['post_type_args'])) {
				register_post_type($base_post_type['post_type_name'], $base_post_type['post_type_args']);
				// Register taxonomy for post type
				if (!empty($base_post_type['taxonomy_name']) && !empty($base_post_type['taxonomy_args'])) {
					register_taxonomy($base_post_type['taxonomy_name'], $base_post_type['post_type_name'], $base_post_type['taxonomy_args']);
				}
			}
		}
	}

}


/** Use this to deregister bad post types **/
if (!function_exists('unregister_post_type')) {
	function unregister_post_type($post_type)
	{
		global $wp_post_types;
		if (!empty($wp_post_types[$post_type])) {
			unset($wp_post_types[$post_type]);
			return true;
		}
		return false;
	}
}