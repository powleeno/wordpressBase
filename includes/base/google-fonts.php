<?php

function base_set_google_fonts()
{
	$base_google_fonts = array();

	$base_google_fonts['sans'] = array(
		'family' => 'google_font_roboto',
		'url' => 'http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	);

	$base_google_fonts['serif'] = array(
		'family' => 'google_font_roboto_slab',
		'url' => 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
	);

	$base_google_fonts['mono'] = array(
		'family' => 'google_font_roboto_mono',
		'url' => 'http://fonts.googleapis.com/css?family=Roboto+Mono:400,300,300italic,400italic,700,700italic'
	);

	foreach ($base_google_fonts as $base_google_font) {
		wp_register_style($base_google_font['family'], $base_google_font['url']);
		wp_enqueue_style($base_google_font['family']);
	}

}
