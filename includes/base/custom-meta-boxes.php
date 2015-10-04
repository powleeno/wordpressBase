<?php


/** Custom Meta Boxes 2 :: https://github.com/WebDevStudios/CMB2 **/


function base_set_custom_meta_boxes(array $base_meta_boxes)
{
	// Start with an underscore to hide fields from custom fields list
	$base_fields_prefix = base_fields_prefix();

	/*
	 *
	 * Left empty : populate after examples library
	 *
	 */

	return $base_meta_boxes;

}


// Remove feature support for specific custom page template
function base_remove_templates_support()
{
	$base_templates = array();

	/*
     *
     * Left empty : populate after examples library
     *
     */

	foreach ($base_templates as $base_template) {
		if ($base_template['page_file'] && $base_template['remove_support']) {
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
			if (isset($post_id)) {
				$base_template_file = get_post_meta($post_id, '_wp_page_template', true);
				if ($base_template_file == $base_template['page_file']) {
					foreach ($base_template['remove_support'] as $base_template_support) {
						remove_post_type_support('page', $base_template_support);
					}
				}
			}
		}
	}

}


// Remove feature support for pages
function base_remove_pages_support()
{
	$base_features = array( /* 'editor', 'comments', 'custom-fields', 'discussion', 'author', 'thumbnail' */ );
	foreach ($base_features as $base_feature) {
		remove_post_type_support('page', $base_feature);
	}
}