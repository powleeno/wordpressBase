<?php

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