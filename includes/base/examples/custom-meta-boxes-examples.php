<?php


/** Custom Meta Boxes 2 :: https://github.com/WebDevStudios/CMB2 **/


// Example #1 -----------------------------------

$meta_boxes['leftColumn'] = array(
    'id' => 'leftColumn',
    'title' => __( 'Left Column', 'custom metaboxes' ),
    'object_types' => array('subjects', ),
    // 'show_on'       => array( 'key' => 'page-template', 'value' => $pagesTwoColumns ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => false,
    'fields' => array(
        array(
            'name' => __( 'Left Column', 'custom metaboxes' ),
            'id' => $prefix . 'left_column',
            'sanitization_cb' => false,
            'type' => 'wysiwyg',
            'options' => $wysiwygFull
        ),
    )
);


// Example #2 -----------------------------------

$meta_boxes['rightColumn'] = array(
    'id' => 'rightColumn',
    'title' => __( 'Right Column', 'custom metaboxes' ),
    'object_types' => array('subjects', ),
    // 'show_on'       => array( 'key' => 'page-template', 'value' => $pagesTwoColumns ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => false,
    'fields' => array(
        array(
            'name' => __( 'Right Column', 'custom metaboxes' ),
            'id' => $prefix . 'right_column',
            'sanitization_cb' => false,
            'type' => 'wysiwyg',
            'options' => $wysiwygFull
        ),
    )
);


// Example #3 -----------------------------------

$meta_boxes['blocks_section'] = array(
    'id'         => $prefix . 'blocks_section',
    'title'      => __( 'Blocks Section', 'custom metaboxes' ),
    'object_types' => array('page'),
    'context' => 'normal',
    'priority' => 'high',
    'show_on'       => array( 'key' => 'page-template', 'value' => $blocks_pages ),
    'fields'     => array(
        array(
            'name'    => __( 'Activation', 'custom metaboxes' ),
            'id'      => $prefix . 'blocks_section_activation',
            'type'    => 'radio_inline',
            'desc' => __( 'Select whether this section is to be displayed in the front-end.', 'custom metaboxes' ),
            'default' => 'active',
            'options' => array(
                'active'  => __( 'Active Section', 'custom metaboxes' ),
                'inactive' => __( 'Inactive Section', 'custom metaboxes' ),
            ),
        ),
        array(
            'id'          => $prefix . 'blocks',
            'type'        => 'group',
            // 'desc' => __( 'Insert Page Blocks', 'custom metaboxes' ),
            'options'     => array(
                'group_title'   => __( 'Block #{#}', 'custom metaboxes' ), // {#} gets replaced by row number
                'add_button'    => __( 'Add Another Block', 'custom metaboxes' ),
                'remove_button' => __( 'Remove Block', 'custom metaboxes' ),
                'sortable'      => true, // beta
            ),
            // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
            'fields'      => array(
                array(
                    'name'    => __( 'Layout', 'custom metaboxes' ),
                    'id'      => $prefix . 'block_layout',
                    'type'    => 'radio_inline',
                    'desc' => __( 'Select block layout.', 'custom metaboxes' ),
                    'default' => 'full',
                    'options' => array(
                        'full'  => __( 'Full Width', 'custom metaboxes' ),
                        'split' => __( 'Split Width', 'custom metaboxes' ),
                        'box'  => __( 'Boxed', 'custom metaboxes' ),
                    ),
                ),
                array(
                    'name' => __( 'Image', 'custom metaboxes' ),
                    'id' => $prefix . 'block_image',
                    'type' => 'file',
                    'desc' => __( 'Only available with "Boxed" layout.', 'custom metaboxes' ),
                    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
                ),
                array(
                    'name'    => __( 'Float', 'custom metaboxes' ),
                    'id'      => $prefix . 'block_float',
                    'type'    => 'radio_inline',
                    'desc' => __( 'Select image float. Only available with "Boxed" layout.', 'custom metaboxes' ),
                    'default' => 'left',
                    'options' => array(
                        'left'  => __( 'Image to the left', 'custom metaboxes' ),
                        'right' => __( 'Image to the right', 'custom metaboxes' ),
                    ),
                ),
                array(
                    'name' => __( 'Main Column', 'custom metaboxes' ),
                    'id' => $prefix . 'block_main_column',
                    'sanitization_cb' => false,
                    'type' => 'wysiwyg',
                    'options' => $wysiwygFull
                ),
                array(
                    'name' => __( 'Secondary Column', 'custom metaboxes' ),
                    'id' => $prefix . 'block_secondary_column',
                    'desc' => __( 'Only available with "Split Width" layout.', 'custom metaboxes' ),
                    'sanitization_cb' => false,
                    'type' => 'wysiwyg',
                    'options' => $wysiwygFull
                ),
            ),
        ),
    ),
);


// Example #4 -----------------------------------

$meta_boxes['locations'] = array(
    'id' => 'locations',
    'title' => __( 'Location', 'custom metaboxes' ),
    'object_types' => array('locations', ),
    // 'show_on'       => array( 'key' => 'post', 'value' => 'locations' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
    'fields' => array(
        array(
            'name' => __( 'Address', 'custom metaboxes' ),
            'id' => $prefix . 'address',
            'desc' => __( '', 'custom metaboxes' ),
            'sanitization_cb' => false,
            'type' => 'text',
        ),
        array(
            'name' => __( 'Information' ),
            'id' => $prefix . 'information',
            'desc' => __( '', 'custom metaboxes' ),
            'sanitization_cb' => false,
            'type' => 'wysiwyg',
            'options' => $wysiwygFull
        ),
    )
);


// WYSIWYG Options Arrays ------------------------------------------------

$wysiwygMinimal = array(
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
$wysiwygFull = array(
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

$templates['blocks-page'] = array(
    'page_file' => 'page-blocks.php',
    'remove_support' => array( 'editor', 'comments', 'custom-fields', 'discussion', 'author', 'thumbnail' )
);



