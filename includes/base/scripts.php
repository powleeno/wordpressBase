<?php


function base_set_scripts()
{
	$base_scripts = array();
	$base_scripts_path = get_template_directory_uri() . '/scripts/';

	// HEADER ------------------------------------------------------------

	/** jQuery :: http://jquery.com/ **/
	$base_scripts['jquery'] = array(
		'active' => true,
		'deregister_first' => true,
		'handler' => 'jquery',
		'cdn' => 'http://code.jquery.com/jquery-1.11.3.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/jquery/jquery-1.11.3.min.js',
		'dependencies' => false,
		'version' => '1.11.3',
		'set_in_footer' => false
	);

	/** jQuery Mousewheel :: https://github.com/jquery/jquery-mousewheel **/
	$base_scripts['jquery-mousewheel'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'jquery-mousewheel',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/mousewheel/jquery.mousewheel.min.js',
		'dependencies' => false,
		'version' => '3.1.12',
		'set_in_footer' => false
	);

	// FOOTER ------------------------------------------------------------

	/** from Eric B. Dev - Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress **/
	$base_scripts['ericbdev'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'ericbdev',
		'cdn' => '', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/ericbdev/ericbdev.js',
		'dependencies' => false,
		'version' => '1.0.0',
		'set_in_footer' => true
	);

	/** Fancybox 2 :: https://github.com/fancyapps/fancyBox **/
	$base_scripts['fancybox'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/fancybox/jquery.fancybox.pack.js',
		'dependencies' => false,
		'version' => '1.11.3',
		'set_in_footer' => true
	);
	$base_scripts['fancybox_buttons'] = array( // only here because doesn't work if passed as dependency to 'fancybox'
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox_buttons',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/fancybox/helpers/jquery.fancybox-buttons.js',
		'dependencies' => false,
		'version' => '1.0.5',
		'set_in_footer' => true
	);
	$base_scripts['fancybox_media'] = array( // only here because doesn't work if passed as dependency to 'fancybox'
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox_media',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/fancybox/helpers/jquery.fancybox-media.js',
		'dependencies' => false,
		'version' => '1.0.6',
		'set_in_footer' => true
	);
	$base_scripts['fancybox_thumbs'] = array( // only here because doesn't work if passed as dependency to 'fancybox'
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox_thumbs',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/fancybox/helpers/jquery.fancybox-thumbs.js',
		'dependencies' => false,
		'version' => '1.0.7',
		'set_in_footer' => true
	);

	/** Foundation Zurb :: http://foundation.zurb.com/ **/
	$base_scripts['foundation'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'foundation',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation/foundation.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/foundation/foundation.min.js',
		'dependencies' => false,
		'version' => '5.5.2',
		'set_in_footer' => true
	);
	$base_scripts['foundation_topbar'] = array( // only here because doesn't work if passed as dependency to 'foundation'
		'active' => true,
		'deregister_first' => false,
		'handler' => 'foundation_topbar',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation/foundation.topbar.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/foundation/components/foundation.topbar.js',
		'dependencies' => false,
		'version' => '5.5.2',
		'set_in_footer' => true
	);

	/** Google Maps JavaScript API :: https://developers.google.com/maps/documentation/javascript/ **/
	$base_scripts['google_js_api'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'google_js_api',
		'cdn' => 'http://maps.googleapis.com/maps/api/js?language='.base_wpml_active_language(), // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/google/google-maps-api-'.base_wpml_active_language().'js',
		'dependencies' => false,
		'version' => '3.0.0',
		'set_in_footer' => true
	);

	/** Sidr :: https://github.com/artberri/sidr **/
	$base_scripts['sidr'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'sidr',
		'cdn' => 'http://cdn.jsdelivr.net/jquery.sidr/1.2.1/jquery.sidr.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/sidr/jquery.sidr.min.js',
		'dependencies' => false,
		'version' => '1.2.1',
		'set_in_footer' => true
	);

	/** Slick Slider :: https://github.com/kenwheeler/slick/ **/
	$base_scripts['slick'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'slick',
		'cdn' => 'http://cdn.jsdelivr.net/jquery.slick/1.5.5/slick.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/slick/slick.min.js',
		'dependencies' => false,
		'version' => '1.5.5',
		'set_in_footer' => true
	);

	/** Validate :: https://github.com/jzaefferer/jquery-validation **/
	$base_scripts['jQuery_validate'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'jQuery_validate',
		'cdn' => 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/validate/jquery.validate.min.js',
		'dependencies' => false,
		'version' => '1.14.0',
		'set_in_footer' => true
	);


	/** BASE THEME SCRIPTS ---------------------------------------- **/
	$base_scripts['base'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'base',
		'cdn' => '',
		'local' => $base_scripts_path . 'base.js',
		'dependencies' => array(
			array(
				'active' => true,
				'deregister_first' => false,
				'handler' => 'base_functions',
				'cdn' => '',
				'local' => $base_scripts_path . 'base/functions.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			),
			array(
				'active' => false,
				'deregister_first' => false,
				'handler' => 'base_google_map',
				'cdn' => '',
				'local' => $base_scripts_path . 'base/google-map.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			),
			array(
				'active' => true,
				'deregister_first' => false,
				'handler' => 'base_inits',
				'cdn' => '',
				'local' => $base_scripts_path . 'base/inits.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			)
		),
		'version' => '1.0',
		'set_in_footer' => true
	);

	$base_script_handlers = base_register_scripts($base_scripts);
	foreach ($base_script_handlers as $base_script_handler) {
		wp_enqueue_script($base_script_handler);
	}

}

function base_register_scripts($base_scripts)
{
	$base_script_handlers = array();
	if (!empty($base_scripts)) {
		foreach ($base_scripts as $base_script) {
			if (!empty($base_script['active'])) {
				array_push($base_script_handlers, $base_script['handler']);
				if (!empty($base_script['deregister_first'])) {
					wp_deregister_script($base_script['handler']);
				}
				if (!empty($base_script['cdn'])) {
					$base_http_headers = get_headers($base_script['cdn']);
					if (substr($base_http_headers[0], 9, 3) == '200') {
						$base_script_source = $base_script['cdn'];
					}
				} else if (!empty($base_script['local'])) {
					$base_script_source = $base_script['local'];
				} else {
					continue;
				}
				$base_script_dependencies = base_register_scripts($base_script['dependencies']);
				wp_register_script($base_script['handler'], $base_script_source, $base_script_dependencies, $base_script['version'], $base_script['set_in_footer']);
			}
		}
	}
	return $base_script_handlers;
}