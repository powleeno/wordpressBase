<?php

function fancybox_gallery( $atts, $content=null ){
	$parameters = shortcode_atts( array(
		'small' => '',
		'medium' => '',
		'large' => '',
		'class' => '',
		'identifier' => '',
		'ids' => '',
	), $atts, 'fancy_gallery' );
	$return_html = '';
	$return_html .= '<ul class="';
	$return_html .= ($parameters['small'] != '' ? 'small-block-grid-'.$parameters['small'].' ' : '');
	$return_html .= ($parameters['medium'] != '' ? 'medium-block-grid-'.$parameters['medium'].' ' : '');
	$return_html .= ($parameters['large'] != '' ? 'large-block-grid-'.$parameters['large'].' ' : '');
	$return_html .= ($parameters['class'] != '' ? $parameters['class'] : '');
	$return_html .= '">';
	$id_list = explode(",", $parameters['ids']);
	foreach($id_list as $id){
		$item = get_post( $id );
		$title = $item->post_title;
		$caption = $item->post_excerpt;
		$description = $item->post_content;
		$url = $item->guid;
		$return_html .= '<li>';
		$return_html .= '<a href="'.$url.'" class="fancybox" ';
		$return_html .= 'rel="'.$parameters['identifier'].'" ';
		$return_html .= 'title="'.$title.'">';
		//$return_html .= 'style="background-image:url('.$url.');">';

		$return_html .= '<img src="'.$url.'" />';

		$return_html .= '</a>';
		$return_html .= '</li>';

	}
	$return_html .= '</ul>';
	return $return_html;
}
add_shortcode( 'fancy_gallery', 'fancybox_gallery' );