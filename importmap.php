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
        'version' => '2.30.0',
    ],
    '@babel/runtime/helpers/esm/typeof' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/createForOfIteratorHelper' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/assertThisInitialized' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/inherits' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/createSuper' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/classCallCheck' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/createClass' => [
        'version' => '7.23.8',
    ],
    '@babel/runtime/helpers/esm/defineProperty' => [
        'version' => '7.23.8',
    ],
    'bootstrap-icons/font/bootstrap-icons.min.css' => [
        'version' => '1.11.3',
        'type' => 'css',
    ],
    'flowbite' => [
        'version' => '2.5.2',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    'flowbite/dist/flowbite.min.css' => [
        'version' => '2.5.2',
        'type' => 'css',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.12',
    ],
    'highlight.js' => [
        'version' => '11.10.0',
    ],
    'highlight.js/styles/nord.min.css' => [
        'version' => '11.10.0',
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
        'version' => '0.171.0',
    ],
    'flowbite-datepicker' => [
        'version' => '1.3.0',
    ],
    'reveal.js' => [
        'version' => '5.1.0',
    ],
    'reveal.js/dist/reveal.css' => [
        'version' => '5.1.0',
        'type' => 'css',
    ],
    'reveal.js/dist/theme/white.css' => [
        'version' => '5.1.0',
        'type' => 'css',
    ],
    'reveal.js/plugin/markdown/markdown.esm.js' => [
        'version' => '5.1.0',
    ],
    'reveal.js/dist/theme/serif.css' => [
        'version' => '5.1.0',
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
        'version' => '4.3.5',
    ],
    'node-gyp-build' => [
        'version' => '4.8.1',
    ],
    'ms' => [
        'version' => '2.1.2',
    ],
    'stimulus-timeago' => [
        'version' => '4.1.0',
    ],
];
