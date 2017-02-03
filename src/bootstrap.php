<?php
/**
 * Bootstrap
 *
 * Bootstrap file, all request must be validated by this file!
 * Please change cache configuration to "true" for production environment
 *
 * @category  Core
 * @package   allnetwork-web
 * @author    Prastowo aGung Widodo <agung@transformatika.com>
 * @license   GPLv3
 * @version   GIT: $Id$
 * @link      https://github.com/IrcAllnetwork/allnetwork-web
 */
 use Zend\Session\Config\StandardConfig;
 use Zend\Session\SessionManager;
 use Zend\Session\Container;
 use Zend\Session\Validator\HttpUserAgent;
 use Zend\Session\Validator\RemoteAddr;
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

/**
 * Session Configuration
 * @var StandardConfig
 */
$sessionConfig = new StandardConfig();
$sessionConfig->setOptions([
    'remember_me_seconds' => 1440,
    'name'                => 'allnetworkweb',
    'save_path'           => sys_get_temp_dir()
]);

$sessionManager = new SessionManager($sessionConfig);
$sessionManager->getValidatorChain()
    ->attach('session.validate', [new HttpUserAgent(), 'isValid']);

/**
 * Fix Automatic logout
 * Disable Remote Address Validation
 * because some ISP using load balancer connection with many IP Addresses
 */
// $sessionManager->getValidatorChain()
//     ->attach('session.validate', [new RemoteAddr(), 'isValid']);

Container::setDefaultManager($sessionManager);

/*
* Initializing Propel ORM
*/
if (Config::getConfig('usePropel') == 'true' || Config::getConfig('usePropel') === true) {
    require_once 'propel.php';
}

/**
 * Routing Configuration
 * By default, RouteDispatcher will looking for Router.php file on each module directory
 * @var RouteDispatcher
 */
$router = new RouteDispatcher();
// $router->setMiddleWare('\Transformatika\MiddleWare\SessionMiddleware');
$router->dispatch();
