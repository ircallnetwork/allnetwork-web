<?php
namespace AllNetwork\Page\Controller;

use Transformatika\MVC\Controller;
use AllNetwork\Page\Model\PageModel;

class PageController extends Controller
{
    protected $model;
    
    public function __construct()
    {
        parent::__construct();
        $this->model = new PageModel();
    }

    public function indexAction()
    {
        $page = $this->model->getPage();
    }

    public function filterByTagAction($tag = '')
    {
        $page = $this->model->getPageByTag($tag);
        return [
            'page' => $tag,
            'title' => $tag,
            'data' => $page
        ];
    }
}