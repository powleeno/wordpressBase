<?php


// SETUP -----------------------------------------------------------------

require_once 'includes/base.php';


// HELPERS ---------------------------------------------------------------

// Sets favicons; place files in $favicons_path
// Favicon generator online tool :: http://www.favicon-generator.org
function base_set_favicons($favicons_path)
{
	echo '<link rel="apple-touch-icon" sizes="57x57" href="' . $favicons_path . 'apple-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="' . $favicons_path . 'apple-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="' . $favicons_path . 'apple-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="' . $favicons_path . 'apple-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="' . $favicons_path . 'apple-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="' . $favicons_path . 'apple-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="' . $favicons_path . 'apple-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="' . $favicons_path . 'apple-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . $favicons_path . 'apple-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" sizes="192x192"  href="' . $favicons_path . 'android-icon-192x192.png">';
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $favicons_path . 'favicon-32x32.png">';
	echo '<link rel="icon" type="image/png" sizes="96x96" href="' . $favicons_path . 'favicon-96x96.png">';
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . $favicons_path . 'favicon-16x16.png">';
	echo '<link rel="manifest" href="' . $favicons_path . 'manifest.json">';
	echo '<meta name="msapplication-TileColor" content="#ffffff">';
	echo '<meta name="msapplication-TileImage" content="' . $favicons_path . 'ms-icon-144x144.png">';
	echo '<meta name="theme-color" content="#ffffff">';
}


function base_limit_string($string, $limit = 25, $suffix = '...')
{
	if ($suffix) {
		$sufixed_limit = $limit - strlen($suffix);
	} else {
		$sufixed_limit = $limit;
	}
	if (strlen($string) >= $limit) {
		$limited_string = substr($string, 0, $sufixed_limit) . $suffix;
	} else {
		$limited_string = $string;
	}
	return $limited_string;
}


function base_form_build_message($form_name, $form_email, $form_country, $form_phone, $form_message)
{
	$body = '<html>';
	$body .= '<table width="100%">';
	$body .= '<tr><td>' . apply_filters('the_content', $form_message) . '</td></tr>';
	$body .= '<tr><td>&nbsp;</td></tr>';
	$body .= '<tr><td><strong>' . $form_name . '</strong></td></tr>';
	$body .= '<tr><td><strong>' . $form_country . '</strong></td></tr>';
	$body .= '<tr><td>' . $form_email . '</td></tr>';
	if (!empty($form_phone)) {
		$body .= '<tr><td>' . $form_phone . '</td></tr>';
	}
	$body .= '<tr><td><br/>&nbsp;</td></tr>';
	$body .= '</table>';
	$body .= '</html>';

	return $body;
}


function base_form_build_headers($form_name, $form_email)
{
	$headers = 'From: ' . $form_name . ' <' . $form_email . '>' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";

	return $headers;
}

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


