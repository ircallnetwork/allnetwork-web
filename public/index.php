<?php
/**
 * AllNetwork Web
 *
 * Main index file
 *
 * @category  General
 * @package   allnetwork-web
 * @author    Prastowo aGung Widodo <agung@transformatika.com>
 * @copyright 2016 PT Daya Transformatika
 * @license   GPLv3
 * @version   GIT: $Id$
 * @link      https://github.com/IrcAllnetwork/allnetwork-web
 */
date_default_timezone_set('Asia/Jakarta');

/**
 *  Fix Not valid https headers if using Cloudflare
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $protocol = $_SERVER['HTTP_X_FORWARDED_PROTO'].'://';
} else {
    $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
}

/**
 * Fix CORS Headers
 */
if ( $parts = parse_url($_SERVER['HTTP_REFERER']) ) {
    header("Access-Control-Allow-Origin: ".$parts["scheme"]."://".$parts["host"]);
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 1");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
}

$serverName = $_SERVER['SERVER_NAME'];
$path = '';

/**
 * Fix chrome headers issue
 *
 */
if (@$_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

define('BASE_URL', $protocol.$serverName.$path.'/');
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__).DS.'..'));

require_once BASE_PATH . DS . 'vendor' . DS . 'autoload.php';
require_once BASE_PATH . DS . 'src' . DS. 'bootstrap.php';
