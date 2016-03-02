<?php


// SETUP -----------------------------------------------------------------

require_once 'includes/base.php';


// THEME -----------------------------------------------------------------

// Retrieves locations post type information for passing to Google Map
function base_get_map_locations()
{
	$base_fields_prefix = base_fields_prefix();
	$map_locations = new WP_Query(
		array(
			'post_type' => 'locations',
			'posts_per_page' => -1,
			'orderby' => 'menu',
			'order' => 'ASC',
		)
	);
	$map_locations_array = array();
	if ($map_locations->have_posts()) {
		while ($map_locations->have_posts()) {
			$map_locations->the_post();
			$map_location_name = get_the_title();
			$map_location_address = get_post_meta($map_locations->post->ID, $base_fields_prefix . 'address');
			$map_location_information = get_post_meta($map_locations->post->ID, $base_fields_prefix . 'information');
			$map_location = array(
				'name' => $map_location_name,
				'address' => $map_location_address[0],
				'information' => apply_filters('the_content', $map_location_information[0]),
			);
			array_push($map_locations_array, $map_location);
		}
	}
	wp_reset_query();
	return $map_locations_array;
}