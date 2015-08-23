<?php


function base_load_scripts()
{
	$scripts = array();
	$scripts_path = get_template_directory_uri() . '/scripts/';

	// HEADER ------------------------------------------------------------

	/** jQuery :: http://jquery.com/ **/
	$scripts['jquery'] = array(
		'active' => true,
		'deregister_first' => true,
		'handler' => 'jquery',
		'cdn' => 'http://code.jquery.com/jquery-1.11.3.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/jquery/jquery-1.11.3.min.js',
		'dependencies' => false,
		'version' => '1.11.3',
		'set_in_footer' => false
	);

	/** jQuery Mousewheel :: https://github.com/jquery/jquery-mousewheel **/
	$scripts['jquery-mousewheel'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'jquery-mousewheel',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/mousewheel/jquery.mousewheel.min.js',
		'dependencies' => false,
		'version' => '3.1.12',
		'set_in_footer' => false
	);

	// FOOTER ------------------------------------------------------------

	/** Fancybox 2 :: https://github.com/fancyapps/fancyBox **/
	$scripts['fancybox'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/fancybox/jquery.fancybox.pack.js',
		'dependencies' => false,
		'version' => '1.11.3',
		'set_in_footer' => true
	);
	$scripts['fancybox_buttons'] = array( // only here because doesn't work if passed as dependency to 'fancybox'
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox_buttons',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/fancybox/helpers/jquery.fancybox-buttons.js',
		'dependencies' => false,
		'version' => '1.0.5',
		'set_in_footer' => true
	);
	$scripts['fancybox_media'] = array( // only here because doesn't work if passed as dependency to 'fancybox'
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox_media',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/fancybox/helpers/jquery.fancybox-media.js',
		'dependencies' => false,
		'version' => '1.0.6',
		'set_in_footer' => true
	);
	$scripts['fancybox_thumbs'] = array( // only here because doesn't work if passed as dependency to 'fancybox'
		'active' => false,
		'deregister_first' => false,
		'handler' => 'fancybox_thumbs',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/fancybox/helpers/jquery.fancybox-thumbs.js',
		'dependencies' => false,
		'version' => '1.0.7',
		'set_in_footer' => true
	);

	/** Foundation Zurb :: http://foundation.zurb.com/ **/
	$scripts['foundation'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'foundation',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation/foundation.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/foundation/foundation.min.js',
		'dependencies' => false,
		'version' => '5.5.2',
		'set_in_footer' => true
	);
	$scripts['foundation_topbar'] = array( // only here because doesn't work if passed as dependency to 'foundation'
		'active' => true,
		'deregister_first' => false,
		'handler' => 'foundation_topbar',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation/foundation.topbar.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/foundation/components/foundation.topbar.js',
		'dependencies' => false,
		'version' => '5.5.2',
		'set_in_footer' => true
	);

	/** Google Maps JavaScript API :: https://developers.google.com/maps/documentation/javascript/ **/
	$scripts['google_js_api'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'google_js_api',
		'cdn' => 'http://maps.googleapis.com/maps/api/js?language='.base_wpml_active_language(), // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/google/google-maps-api-'.base_wpml_active_language().'js',
		'dependencies' => false,
		'version' => '3.0.0',
		'set_in_footer' => true
	);

	/** Lazy Load :: https://github.com/tuupola/jquery_lazyload **/
	$scripts['lazyload'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'lazyload',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/lazyload/jquery.lazyload.min.js',
		'dependencies' => false,
		'version' => '1.9.1',
		'set_in_footer' => true
	);

	/** Masonry :: https://github.com/desandro/masonry **/
	$scripts['masonry'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'masonry',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/masonry/masonry.pkgd.min.js',
		'dependencies' => false,
		'version' => '3.3.1',
		'set_in_footer' => true
	);

	/** Modernizr :: https://github.com/Modernizr/Modernizr **/
	$scripts['modernizr'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'modernizr',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/modernizr/modernizr.custom.min.js',
		'dependencies' => false,
		'version' => '2.8.3',
		'set_in_footer' => true
	);

	/** Scroll Magic :: https://github.com/janpaepke/ScrollMagic **/
	$scripts['scrollmagic'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'scrollmagic',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/masonry/masonry.pkgd.min.js',
		'dependencies' => false,
		'version' => '2.05',
		'set_in_footer' => true
	);
	$scripts['scrollmagic_indicators'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'scrollmagic_indicators',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/masonry/masonry.pkgd.min.js',
		'dependencies' => false,
		'version' => '2.05',
		'set_in_footer' => true
	);

	/** Sidr :: https://github.com/artberri/sidr **/
	$scripts['sidr'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'sidr',
		'cdn' => 'http://cdn.jsdelivr.net/jquery.sidr/1.2.1/jquery.sidr.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/sidr/jquery.sidr.min.js',
		'dependencies' => false,
		'version' => '1.2.1',
		'set_in_footer' => true
	);

	/** Slick Slider :: https://github.com/kenwheeler/slick/ **/
	$scripts['slick'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'slick',
		'cdn' => 'http://cdn.jsdelivr.net/jquery.slick/1.5.5/slick.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $scripts_path . 'vendor/slick/slick.min.js',
		'dependencies' => false,
		'version' => '1.5.5',
		'set_in_footer' => true
	);


	/** fullPage.js :: https://github.com/ericbdev/fullPage.js **/


	/** Validate :: https://github.com/jzaefferer/jquery-validation **/


	/** BASE THEME SCRIPTS ---------------------------------------- **/
	$scripts['base'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'base',
		'cdn' => '',
		'local' => $scripts_path . 'base.js',
		'dependencies' => array(
			array(
				'active' => true,
				'deregister_first' => false,
				'handler' => 'base_functions',
				'cdn' => '',
				'local' => $scripts_path . 'base/functions.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			),
			array(
				'active' => false,
				'deregister_first' => false,
				'handler' => 'base_google_map',
				'cdn' => '',
				'local' => $scripts_path . 'base/google-map.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			),
			array(
				'active' => true,
				'deregister_first' => false,
				'handler' => 'base_inits',
				'cdn' => '',
				'local' => $scripts_path . 'base/inits.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			)
		),
		'version' => '1.0',
		'set_in_footer' => true
	);

	$script_handlers = base_register_scripts($scripts);
	foreach ($script_handlers as $script_handler) {
		wp_enqueue_script($script_handler);
	}

}

function base_register_scripts($scripts)
{
	$script_handlers = array();
	if ($scripts) {
		foreach ($scripts as $script) {
			if ($script['active']) {
				array_push($script_handlers, $script['handler']);
				if ($script['deregister_first']) {
					wp_deregister_script($script['handler']);
				}
				if ($script['cdn']) {
					$http_headers = get_headers($script['cdn']);
					if (substr($http_headers[0], 9, 3) == '200') {
						$src = $script['cdn'];
					}
				} else if ($script['local']) {
					$src = $script['local'];
				} else {
					continue;
				}
				$deps = base_register_scripts($script['dependencies']);
				wp_register_script($script['handler'], $src, $deps, $script['version'], $script['set_in_footer']);
			}
		}
	}
	return $script_handlers;
}