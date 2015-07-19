<?php


/** Custom Meta Boxes 2 :: https://github.com/WebDevStudios/CMB2 **/


function set_custom_meta_boxes(array $meta_boxes)
{
    // Start with an underscore to hide fields from custom fields list
    $prefix = get_prefix();

    /*
     *
     * Left empty : populate after examples library
     *
     */

    return $meta_boxes;

}


// Remove feature support for specific custom page template
function remove_templates_support()
{
    $templates = array();

	/*
     *
     * Left empty : populate after examples library
     *
     */

    foreach($templates as $template){
        if ($template['page_file'] && $template['remove_support']) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
            if ( isset($post_id) ) {
                $template_file = get_post_meta($post_id, '_wp_page_template', true);
                if ($template_file == $template['page_file']) {
                    foreach ($template['remove_support'] as $support) {
                        remove_post_type_support('page', $support);
                    }
                }
            }
        }
    }

}


