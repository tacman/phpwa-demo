<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    'receiver' => [
        'path' => './assets/receiver.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
    '@symfony/ux-leaflet-map' => [
        'path' => './vendor/symfony/ux-leaflet-map/assets/dist/map_controller.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    'moustache' => [
        'version' => '0.0.4',
    ],
    'date-fns' => [
        'version' => '4.1.0',
    ],
    '@babel/runtime/helpers/esm/typeof' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/createForOfIteratorHelper' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/assertThisInitialized' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/inherits' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/createSuper' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/classCallCheck' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/createClass' => [
        'version' => '7.26.10',
    ],
    '@babel/runtime/helpers/esm/defineProperty' => [
        'version' => '7.26.10',
    ],
    'mustache' => [
        'version' => '4.2.0',
    ],
    'flowbite' => [
        'version' => '3.1.2',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    'flowbite/dist/flowbite.min.css' => [
        'version' => '3.1.2',
        'type' => 'css',
    ],
    'babel-runtime/core-js/promise' => [
        'version' => '6.26.0',
    ],
    'highlight.js' => [
        'version' => '11.11.1',
    ],
    'highlight.js/styles/nord.min.css' => [
        'version' => '11.11.1',
        'type' => 'css',
    ],
    'leaflet' => [
        'version' => '1.9.4',
    ],
    'leaflet/dist/leaflet.min.css' => [
        'version' => '1.9.4',
        'type' => 'css',
    ],
    'three.js' => [
        'version' => '0.77.1',
    ],
    'three' => [
        'version' => '0.174.0',
    ],
    'reveal.js' => [
        'version' => '5.2.0',
    ],
    'reveal.js/dist/reveal.css' => [
        'version' => '5.2.0',
        'type' => 'css',
    ],
    'reveal.js/dist/theme/white.css' => [
        'version' => '5.2.0',
        'type' => 'css',
    ],
    'reveal.js/plugin/markdown/markdown.esm.js' => [
        'version' => '5.2.0',
    ],
    'reveal.js/dist/theme/serif.css' => [
        'version' => '5.2.0',
        'type' => 'css',
    ],
    'vosk' => [
        'version' => '0.3.39',
    ],
    'ffi-napi' => [
        'version' => '4.0.3',
    ],
    'ref-napi' => [
        'version' => '3.0.3',
    ],
    'debug' => [
        'version' => '4.4.0',
    ],
    'node-gyp-build' => [
        'version' => '4.8.4',
    ],
    'ms' => [
        'version' => '2.1.3',
    ],
    'flowbite-datepicker' => [
        'version' => '1.3.2',
    ],
    'core-js/library/fn/promise' => [
        'version' => '2.6.12',
    ],
    'core-js' => [
        'version' => '3.41.0',
    ],
];
