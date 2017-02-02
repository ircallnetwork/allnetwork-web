<?php
/**
* Propel Handler
* File ini harus di include agar Propel ORM dapat digunakan
*/
use Transformatika\Config\Config;

/*
 * Propel Configuration
 */
$dbConfig = Config::readConfigFile('database.yaml');
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('default', $dbConfig['driver']);
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
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
$manager->setName('default');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');
