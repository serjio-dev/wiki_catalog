<?php

use Wiki\Catalog\Controllers\{Articles, Index, Tags, References};
use Wiki\Catalog\Data\Connector;

define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/..');

require_once '../vendor/autoload.php';
$confDb = require '../config/db.php';

$uri = $_SERVER['REQUEST_URI'];
$urlPath = parse_url($uri, PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$mappingAction = [
    'GET' => [
        '/' => [Index::class, 'get'],
        '/article' => [Articles::class, 'showItem'],
        '/article/remove' => [Articles::class, 'remove'],
        '/article/list' => [Articles::class, 'showList'],
        '/article/create' => [Articles::class, 'create'],
        '/article/update' => [Articles::class, 'update'],
        '/article/edit' => [Articles::class, 'edit'],
        '/tags' => [Tags::class, 'getList'],
        '/reference' => [References::class, 'showItem'],
        '/reference/list' => [References::class, 'showList'],
        '/references/update' => [References::class, 'update'],
        '/references/remove' => [References::class, 'remove'],
        '/references/edit' => [References::class, 'edit'],
    ],
    'POST' => [
        '/tags/create' => [Tags::class, 'create'],
        '/reference/create' => [References::class, 'create'],
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
