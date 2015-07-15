<?php


/** WP Custom Post Type Class :: https://github.com/jjgrainger/wp-custom-post-type-class/ **/


function set_custom_post_types()
{
    $post_types = array();

    /*
     *
     * Left empty : populate after examples library
     *
     */

    if ($post_types) {
        foreach ($post_types as $post_type) {
            // Register post type
            if ( $post_type['post_type_name'] && $post_type['post_type_args'] ) {
                register_post_type($post_type['post_type_name'], $post_type['post_type_args']);
                // Register taxonomy for post type
                if ($post_type['taxonomy_name'] && $post_type['taxonomy_args']) {
                    register_taxonomy($post_type['taxonomy_name'], $post_type['post_type_name'], $post_type['taxonomy_args']);
                }
            }
        }
    }

}


/** Use this to deregister bad post types **/
if (!function_exists('unregister_post_type')) :
    function unregister_post_type($post_type)
    {
        global $wp_post_types;
        if (isset($wp_post_types[$post_type])) {
            unset($wp_post_types[$post_type]);
            return true;
        }
        return false;
    }
endif;