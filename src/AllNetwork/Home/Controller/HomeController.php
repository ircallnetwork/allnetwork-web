<?php
/**
 * Home Controller
 *
 * Homepage Controller
 * the default page
 *
 * @category  Controller
 * @package   allnetwork-web
 * @author    Prastowo aGung Widodo <agung@transformatika.com>
 * @license   GPLv3
 * @version   GIT: $Id$
 * @link      https://github.com/IrcAllnetwork/allnetwork-web
 */
namespace AllNetwork\Home\Controller;

use Transformatika\MVC\Controller;

class HomeController extends Controller
{
    /**
     * Main Homepage
     * @return [type] [description]
     */
    public function indexAction()
    {
        return [
            'title' => 'Welcome to AllNetwork',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum.',
            'template' => 'Home.twig'
        ];
    }
}
