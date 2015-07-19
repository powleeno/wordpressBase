<?php

/** Redirect First Child :: https://github.com/ericbdev/simpleGridWordPress/blob/master/tpl-redirect-child.php **/
/* Template Name: Redirect First Child */

global $post;

$children = get_pages(
    array(
        'child_of' => $post->ID,
        'sort_order' => 'ASC',
        'sort_column' => 'menu_order'
    )
);

if ($children) {
    $permalink = get_permalink($children[0]->ID);
    wp_redirect($permalink, 301);
    exit();
} else {
    wp_redirect(home_url(), 301);
    exit();
}