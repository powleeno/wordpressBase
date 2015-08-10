<?php

require_once 'includes/base.php';

// HELPERS ---------------------------------------------------------------

/**
 * Sets session variables for use across pages
 */
function set_session_variables()
{
    // if( !isset($_SESSION['map_locations']) ) {
    //     $_SESSION['map_locations'] = get_map_locations();
    // }
}

/**
 * Sets favicons; place files in $path
 * Favicon generator online tool :: http://www.favicon-generator.org/
 */
function set_favicons($path)
{
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'.$path.'apple-icon-57x57.png">';
    echo '<link rel="apple-touch-icon" sizes="60x60" href="'.$path.'apple-icon-60x60.png">';
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'.$path.'apple-icon-72x72.png">';
    echo '<link rel="apple-touch-icon" sizes="76x76" href="'.$path.'apple-icon-76x76.png">';
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'.$path.'apple-icon-114x114.png">';
    echo '<link rel="apple-touch-icon" sizes="120x120" href="'.$path.'apple-icon-120x120.png">';
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'.$path.'apple-icon-144x144.png">';
    echo '<link rel="apple-touch-icon" sizes="152x152" href="'.$path.'apple-icon-152x152.png">';
    echo '<link rel="apple-touch-icon" sizes="180x180" href="'.$path.'apple-icon-180x180.png">';
    echo '<link rel="icon" type="image/png" sizes="192x192"  href="'.$path.'android-icon-192x192.png">';
    echo '<link rel="icon" type="image/png" sizes="32x32" href="'.$path.'favicon-32x32.png">';
    echo '<link rel="icon" type="image/png" sizes="96x96" href="'.$path.'favicon-96x96.png">';
    echo '<link rel="icon" type="image/png" sizes="16x16" href="'.$path.'favicon-16x16.png">';
    echo '<link rel="manifest" href="'.$path.'manifest.json">';
    echo '<meta name="msapplication-TileColor" content="#ffffff">';
    echo '<meta name="msapplication-TileImage" content="'.$path.'ms-icon-144x144.png">';
    echo '<meta name="theme-color" content="#ffffff">';
}

/**
 * Extends Walker to build menus with Foundation Topbar
 */
class Walker_Foundation_Topbar extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0)
    {
        $output .= "<ul class=\"dropdown\">";

    }
}

/**
 * Retrieves locations post type information for passing to Google Map
 */
function get_map_locations()
{
    $prefix = get_prefix();
    $args = array(
        'post_type' => 'locations',
        'posts_per_page' => -1,
        'orderby' => 'menu',
        'order'   => 'ASC',
    );
    $locations = new WP_Query( $args );
    $locations_array = array();
    if ( $locations->have_posts() ) {
        while ( $locations->have_posts() ) {
            $locations->the_post();
            $location_name = get_the_title();
            $location_address = get_post_meta($locations->post->ID, $prefix.'address');
            $location_information = get_post_meta($locations->post->ID, $prefix.'information');
            $location = array(
                'name' => $location_name,
                'address' => $location_address[0],
                'information' => apply_filters('the_content', $location_information[0]),
            );
            array_push($locations_array, $location);
        }
    }
    wp_reset_query();
    return $locations_array;
}


// THEME -----------------------------------------------------------------








