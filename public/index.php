<?php

use Wiki\Catalog\Controllers\Articles;
use Wiki\Catalog\Controllers\Index;
use Wiki\Catalog\Controllers\Tags;
use Wiki\Catalog\Data\Connector;

require_once '../vendor/autoload.php';
$confDb = require '../config/db.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$urlPath = parse_url($uri, PHP_URL_PATH);

$mappingAction = [
    'GET' => [
        '/' => [Index::class, 'get'],
        '/article' => [Articles::class, 'showItem'],
        '/article/remove' => [Articles::class, 'remove'],
        '/article/list' => [Articles::class, 'showList'],
        '/article/create' => [Articles::class, 'create'],
        '/article/update' => [Articles::class, 'update'],
        '/tags' => [Tags::class, 'getList'],
    ],
    'POST' => [
        '/tags/create' => [Tags::class, 'create']
    ]
];


Connector::init(
    $confDb['host'],
    $confDb['port'],
    $confDb['db'],
    $confDb['user'],
    $confDb['pass']
);
list($controllerClass, $action) = $mappingAction[$method][$urlPath];

$controller = new $controllerClass();
$controller->$action();