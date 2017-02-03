<?php
/**
 * Router Configuration
 *
 * Router Configuration for Home Module
 *
 * @category  Config
 * @package   allnetwork-web
 * @author    Prastowo aGung Widodo <agung@transformatika.com>
 * @license   GPLv3
 * @version   GIT: $Id$
 * @link      https://github.com/IrcAllnetwork/allnetwork-web
 */
return [
    [
        'method' => 'GET',
        'path' => '/',
        'controller' => 'AllNetwork\Home\Controller\HomeController#indexAction'
    ]
];
