<?php
/**
* Transformatika Framework
*/
use Transformatika\Config\Config;
use Transformatika\MVC\RouteDispatcher;

Config::init([
    'configExt' => 'yaml',
    'cache' => false
]);

/*
* Environment Setup
*/
if (Config::getConfig('env') === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
} else {
    error_reporting(0);
    ini_set('display_errors', 'Off');
}

/*
* Initializing Propel ORM
*/
if (Config::getConfig('usePropel') == 'true' || Config::getConfig('usePropel') === true) {
    require_once 'propel.php';
}

$router = new RouteDispatcher();

$router->dispatch();
