# AllNetwork - Indonesian IRC Network

* IRC Server: irc.allnetwork.org
* Port: 6667
* SSL Port: 9999

### AllNetwork Web
#### Getting Started

*Installation*
- clone this repository
- run "composer install"
- create apache virtual host with document root pointed to public directory

*How to create Controller*

The directory structure is:
```
[Vendor/Author]/[Module Name]/[Controller/Config/Model/View]
```
example:

**Creating Page Controller**
- create directory AllNetwork/Page/Controller
- create file PageController under AllNetwork/Page/Controller directory

```php
<?php
/**
 * Page Controller
 *
 * Page Controller
 * the page controller
 *
 * @category  Controller
 * @package   allnetwork-web
 * @author    Your Name <youremail@yourdomain.com>
 * @license   GPLv3
 * @version   GIT: $Id$
 * @link      https://github.com/IrcAllnetwork/allnetwork-web
 */
namespace AllNetwork\Page\Controller;

use Transformatika\MVC\Controller;

class PageController extends Controller
{
    /**
     * Index Action
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
            'template' => 'Page.twig'
        ];
    }
}
```

- create template file (View/Page.twig)

```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{title}}</title>
    </head>
    <body>
        {{content}}
    </body>
</html>
```

- create router configuration (Config/Router.php)

```php
<?php
/**
 * Router Configuration
 *
 * Router Configuration for Page Module
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
        'path' => '/page',
        'controller' => 'AllNetwork\Page\Controller\PageController#indexAction'
    ]
];
```
