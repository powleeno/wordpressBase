<?php


/** Custom Meta Boxes 2 :: https://github.com/WebDevStudios/CMB2 **/


// Example #1 -----------------------------------

$meta_boxes['leftColumn'] = array(
    'id' => 'leftColumn',
    'title' => 'Left Column',
    'object_types' => array('subjects', ),
    // 'show_on'       => array( 'key' => 'page-template', 'value' => $pagesTwoColumns ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => false,
    'fields' => array(
        array(
            'name' => 'Left Column',
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
    'title' => 'Right Column',
    'object_types' => array('subjects', ),
    // 'show_on'       => array( 'key' => 'page-template', 'value' => $pagesTwoColumns ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => false,
    'fields' => array(
        array(
            'name' => 'Right Column',
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
            'description' => __( 'Select whether this section is to be displayed in the front-end.', 'custom metaboxes' ),
            'default' => 'active',
            'options' => array(
                'active'  => __( 'Active Section', 'custom metaboxes' ),
                'inactive' => __( 'Inactive Section', 'custom metaboxes' ),
            ),
        ),
        array(
            'id'          => $prefix . 'blocks',
            'type'        => 'group',
            // 'description' => __( 'Insert Page Blocks', 'custom metaboxes' ),
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
                    'description' => __( 'Select block layout.', 'custom metaboxes' ),
                    'default' => 'full',
                    'options' => array(
                        'full'  => __( 'Full Width', 'custom metaboxes' ),
                        'split' => __( 'Split Width', 'custom metaboxes' ),
                        'box'  => __( 'Boxed', 'custom metaboxes' ),
                    ),
                ),
                array(
                    'name' => __( 'Image' ),
                    'id' => $prefix . 'block_image',
                    'type' => 'file',
                    'description' => __( 'Only available with "Boxed" layout.', 'custom metaboxes' ),
                    'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
                ),
                array(
                    'name'    => __( 'Float', 'custom metaboxes' ),
                    'id'      => $prefix . 'block_float',
                    'type'    => 'radio_inline',
                    'description' => __( 'Select image float. Only available with "Boxed" layout.', 'custom metaboxes' ),
                    'default' => 'left',
                    'options' => array(
                        'left'  => __( 'Image to the left', 'custom metaboxes' ),
                        'right' => __( 'Image to the right', 'custom metaboxes' ),
                    ),
                ),
                array(
                    'name' => __( 'Main Column' ),
                    'id' => $prefix . 'block_main_column',
                    'sanitization_cb' => false,
                    'type' => 'wysiwyg',
                    'options' => $wysiwygFull
                ),
                array(
                    'name' => __( 'Secondary Column' ),
                    'id' => $prefix . 'block_secondary_column',
                    'description' => __( 'Only available with "Split Width" layout.', 'custom metaboxes' ),
                    'sanitization_cb' => false,
                    'type' => 'wysiwyg',
                    'options' => $wysiwygFull
                ),
            ),
        ),
    ),
);