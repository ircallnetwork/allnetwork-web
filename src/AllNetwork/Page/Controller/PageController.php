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
        $params = $this->request->getQueryParams();
        $page = !isset($params['page']) ? 1 : (int) $params['page'];
        $this->model->setPage($page);
        $page = $this->model->getPage($params);
    }

    public function filterByTagAction()
    {
        $tag = $this->request->getAttribute('tag');
        $page = $this->model->getDataByTag($tag);
        return [
            'page' => 'Page',
            'title' => 'AllNetwork - HashTag: #' . $tag,
            'records' => $page,
            'tag' => $tag,
            'template' => 'Page.twig'
        ];
    }
}
