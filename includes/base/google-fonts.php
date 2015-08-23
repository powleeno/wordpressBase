<?php

function base_load_google_fonts()
{
	$google_fonts = array();

	$google_fonts['sans'] = array(
		'family' => 'google_font_roboto',
		'url' => 'http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	);

	$google_fonts['serif'] = array(
		'family' => 'google_font_roboto_slab',
		'url' => 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
	);

	$google_fonts['mono'] = array(
		'family' => 'google_font_roboto_mono',
		'url' => 'http://fonts.googleapis.com/css?family=Roboto+Mono:400,300,300italic,400italic,700,700italic'
	);

	foreach ($google_fonts as $font) {
		wp_register_style($font['family'], $font['url']);
		wp_enqueue_style($font['family']);
	}

}
