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
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    'moustache' => [
        'version' => '0.0.4',
    ],
    'stimulus-timeago' => [
        'version' => '4.1.0',
    ],
    'date-fns' => [
        'version' => '3.3.1',
    ],
    '@babel/runtime/helpers/esm/typeof' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/createForOfIteratorHelper' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/assertThisInitialized' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/inherits' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/createSuper' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/classCallCheck' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/createClass' => [
        'version' => '7.24.0',
    ],
    '@babel/runtime/helpers/esm/defineProperty' => [
        'version' => '7.24.0',
    ],
    'mustache' => [
        'version' => '4.2.0',
    ],
    'flowbite' => [
        'version' => '2.3.0',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    'flowbite/dist/flowbite.min.css' => [
        'version' => '2.3.0',
        'type' => 'css',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    'babel-runtime/core-js/promise' => [
        'version' => '6.26.0',
    ],
    'core-js/library/fn/promise' => [
        'version' => '2.6.12',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
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
    '@symfony/ux-leaflet-map' => [
        'path' => './vendor/symfony/ux-leaflet-map/assets/dist/map_controller.js',
    ],
];
