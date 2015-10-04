<?php


/** Custom Meta Boxes 2 :: https://github.com/WebDevStudios/CMB2 **/


// Example #1 -----------------------------------

$base_meta_boxes['left_column'] = array(
	'id' => 'left_column',
	'title' => __('Left Column', 'custom metaboxes'),
	// 'object_types' => array('page'),
	// 'priority' => 'high',
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => false,
	'fields' => array(
		array(
			'name' => __('Left Column', 'custom metaboxes'),
			'id' => $base_fields_prefix . 'left_column',
			'sanitization_cb' => false,
			'type' => 'wysiwyg',
			'options' => $base_wysiwyg_options_full
		),
	)
);


// Example #2 -----------------------------------

$base_meta_boxes['right_column'] = array(
	'id' => 'right_column',
	'title' => __('Right Column', 'custom metaboxes'),
	// 'object_types' => array('page'),
	// 'priority' => 'high',
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => false,
	'fields' => array(
		array(
			'name' => __('Right Column', 'custom metaboxes'),
			'id' => $base_fields_prefix . 'right_column',
			'desc' => __('', 'custom metaboxes'),
			'sanitization_cb' => false,
			'type' => 'wysiwyg',
			'options' => $base_wysiwyg_options_full
		),
	)
);


// Example #3 -----------------------------------

$base_meta_boxes['blocks_section'] = array(
	'id' => $base_fields_prefix . 'blocks_section',
	'title' => __('Blocks Section', 'custom metaboxes'),
	// 'object_types' => array('page'),
	// 'priority' => 'high',
	'context' => 'normal',
	'show_on' => array('key' => 'page-template', 'value' => $blocks_pages),
	'fields' => array(
		array(
			'name' => __('Activation', 'custom metaboxes'),
			'id' => $base_fields_prefix . 'blocks_section_activation',
			'type' => 'radio_inline',
			'desc' => __('', 'custom metaboxes'),
			'default' => 'active',
			'options' => array(
				'active' => __('Active Section', 'custom metaboxes'),
				'inactive' => __('Inactive Section', 'custom metaboxes'),
			),
		),
		array(
			'id' => $base_fields_prefix . 'blocks',
			'type' => 'group',
			'desc' => __( '', 'custom metaboxes' ),
			'options' => array(
				'group_title' => __('Block #{#}', 'custom metaboxes'), // {#} gets replaced by row number
				'add_button' => __('Add Another Block', 'custom metaboxes'),
				'remove_button' => __('Remove Block', 'custom metaboxes'),
				'sortable' => true, // beta
			),
			// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
			'fields' => array(
				array(
					'name' => __('Layout', 'custom metaboxes'),
					'id' => $base_fields_prefix . 'block_layout',
					'type' => 'radio_inline',
					'desc' => __('', 'custom metaboxes'),
					'default' => 'full',
					'options' => array(
						'full' => __('Full Width', 'custom metaboxes'),
						'split' => __('Split Width', 'custom metaboxes'),
						'box' => __('Boxed', 'custom metaboxes'),
					),
				),
				array(
					'name' => __('Image', 'custom metaboxes'),
					'id' => $base_fields_prefix . 'block_image',
					'type' => 'file',
					'desc' => __('', 'custom metaboxes'),
					'allow' => array('url', 'attachment') // limit to just attachments with array( 'attachment' )
				),
				array(
					'name' => __('Float', 'custom metaboxes'),
					'id' => $base_fields_prefix . 'block_float',
					'type' => 'radio_inline',
					'desc' => __('', 'custom metaboxes'),
					'default' => 'left',
					'options' => array(
						'left' => __('Image to the left', 'custom metaboxes'),
						'right' => __('Image to the right', 'custom metaboxes'),
					),
				),
				array(
					'name' => __('Main Column', 'custom metaboxes'),
					'id' => $base_fields_prefix . 'block_main_column',
					'desc' => __('', 'custom metaboxes'),
					'sanitization_cb' => false,
					'type' => 'wysiwyg',
					'options' => $base_wysiwyg_options_full
				),
				array(
					'name' => __('Secondary Column', 'custom metaboxes'),
					'id' => $base_fields_prefix . 'block_secondary_column',
					'desc' => __('', 'custom metaboxes'),
					'sanitization_cb' => false,
					'type' => 'wysiwyg',
					'options' => $base_wysiwyg_options_full
				),
			),
		),
	),
);


// Example #4 -----------------------------------

$base_meta_boxes['map_locations'] = array(
	'id' => 'map_locations',
	'title' => __('Map Location', 'custom metaboxes'),
	// 'object_types' => array('page'),
	// 'priority' => 'high',
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => true,
	'fields' => array(
		array(
			'name' => __('Address', 'custom metaboxes'),
			'id' => $base_fields_prefix . 'map_location_address',
			'desc' => __('', 'custom metaboxes'),
			'sanitization_cb' => false,
			'type' => 'text',
		),
		array(
			'name' => __('Information', 'custom metaboxes'),
			'id' => $base_fields_prefix . 'map_location_information',
			'desc' => __('', 'custom metaboxes'),
			'sanitization_cb' => false,
			'type' => 'wysiwyg',
			'options' => $base_wysiwyg_options_full
		),
	)
);


// WYSIWYG Options Arrays ------------------------------------------------

$base_wysiwyg_options_minimal = array(
	'wpautop' => false,
	'media_buttons' => false,
	'textarea_rows' => get_option('default_post_edit_rows', 5),
	'tabindex' => '',
	'editor_css' => '',
	'editor_class' => '',
	'teeny' => false,
	'dfw' => false,
	'tinymce' => false,
	'quicktags' => false
);
$base_wysiwyg_options_full = array(
	'wpautop' => true,
	'media_buttons' => true,
	'textarea_rows' => get_option('default_post_edit_rows', 10),
	'tabindex' => '',
	'editor_css' => '',
	'editor_class' => '',
	'teeny' => false,
	'dfw' => false,
	'tinymce' => true,
	'quicktags' => true
);


// Remove feature support for specific custom page template --------------

$base_templates['blocks-page'] = array(
	'page_file' => 'page-blocks.php',
	'remove_support' => array('editor', 'comments', 'custom-fields', 'discussion', 'author', 'thumbnail')
);



