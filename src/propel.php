<?php
/**
 * Propel
 *
 * Propel ORM Initializing file
 * This file must be included if you need connection to database
 *
 * @category  Core
 * @package   allnetwork-web
 * @author    Prastowo aGung Widodo <agung@transformatika.com>
 * @license   GPLv3
 * @version   GIT: $Id$
 * @link      https://github.com/IrcAllnetwork/allnetwork-web
 */

use Transformatika\Config\Config;

$dbConfig = Config::readConfigFile('database.yaml');
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('default', $dbConfig['driver']);
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
if ($dbConfig['driver'] === 'sqlite') {
    $manager->setConfiguration(array(
        'dsn' => $dbConfig['driver'].':'.$dbConfig['name'],
        'settings' => array(
            'charset' => $dbConfig['charset'],
            'queries' => array(
            ),
        ),
        'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
    ));
} else {
    $manager->setConfiguration(array(
        'dsn' => $dbConfig['driver'].':host='.$dbConfig['host'].';port='.$dbConfig['port'].';dbname='.$dbConfig['name'],
        'user' => $dbConfig['user'],
        'password' => $dbConfig['password'],
        'settings' => array(
            'charset' => $dbConfig['charset'],
            'queries' => array(
            ),
        ),
        'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
    ));
}
$manager->setName('default');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');
