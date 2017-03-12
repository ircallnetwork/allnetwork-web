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
use AllNetwork\Home\Model\HomeModel;

class HomeController extends Controller
{
    public function indexAction()
    {
        $home = new HomeModel();
        $post = $home->getData();
        return [
            'page' => 'home',
            'title' => 'Welcome to AllNetwork',
            'records' => $post,
            'template' => 'Home.twig'
        ];
    }
}
