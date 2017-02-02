<?php
date_default_timezone_set('Asia/Jakarta');

if (@$_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

$protocol   	= isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
$serverName 	= $_SERVER['SERVER_NAME'];
$path 		= '';

define('BASE_URL', $protocol.$serverName.$path.'/');
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__).DS.'..'));

require_once BASE_PATH . DS . 'vendor' . DS . 'autoload.php';
require_once BASE_PATH . DS . 'src' . DS. 'bootstrap.php';
