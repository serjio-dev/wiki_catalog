<?php

require_once '../vendor/autoload.php';
$confDb = require '../config/db.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


$mappingAction = [
    'GET' => [
        '/' => [\Wiki\Catalog\Controllers\Index::class, 'get'],
        '/article' => [\Wiki\Catalog\Controllers\Articles::class, 'showItem'],
        '/tags' => [\Wiki\Catalog\Controllers\Tags::class, 'getList'],
    ],
    'POST' => [
        '/tags/create' => [\Wiki\Catalog\Controllers\Tags::class, 'create']
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