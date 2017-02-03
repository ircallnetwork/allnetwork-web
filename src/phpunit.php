<?php
/**
* This file is used by phpunit
* usage: vendor/bin/phpunit --bootstrap src/phpunit.php src/
*
* @category  Testing
* @package   allnetwork-web
* @author    Prastowo aGung Widodo <agung@transformatika.com>
* @license   GPLv3
* @version   GIT: $Id$
* @link      https://github.com/IrcAllnetwork/allnetwork-web
*/

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__).DS.'..'));
require_once BASE_PATH.DS.'vendor'.DS.'autoload.php';

\Transformatika\Config\Config::init(array('configExt' => 'yaml'));
if (\Transformatika\Config\Config::getConfig('usePropel') == 'true' || \Transformatika\Config\Config::getConfig('usePropel') === true) {
    require_once dirname(__FILE__).DS.'propel.php';
}
