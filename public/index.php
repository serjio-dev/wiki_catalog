<?php

require_once '../vendor/autoload.php';
$confDb = require '../config/db.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

var_dump(parse_url($uri, PHP_URL_PATH));

$mappingAction = [
    'GET' => [
        '/' => [\Wiki\Catalog\Controllers\Index::class, 'get'],
        '/article' => [\Wiki\Catalog\Controllers\Articles::class, 'showItem'],
        '/tags' => [\Wiki\Catalog\Controllers\Tags::class, 'getList'],
        '/reference' => [\Wiki\Catalog\Controllers\References::class, 'showItem'],
        '/references' => [\Wiki\Catalog\Controllers\References::class, 'getList'],
        '/references/update' => [\Wiki\Catalog\Controllers\References::class, 'update'],
        '/references/remove' => [\Wiki\Catalog\Controllers\References::class, 'remove'],
    ],
    'POST' => [
        '/tags/create' => [\Wiki\Catalog\Controllers\Tags::class, 'create'],
        '/references/create' => [\Wiki\Catalog\Controllers\References::class, 'create'],

    ]
];

\Wiki\Catalog\Data\Connector::init(
    $confDb['host'],
    $confDb['port'],
    $confDb['db'],
    $confDb['user'],
    $confDb['pass']
);
list($controllerClass, $action) = $mappingAction[$method][$uri];


$controller = new $controllerClass();
$controller->$action();