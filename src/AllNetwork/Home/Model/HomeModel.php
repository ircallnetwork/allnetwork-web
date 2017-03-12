<?php
namespace AllNetwork\Home\Model;

use Propel\Table\AllNetwork\TagQuery;

class HomeModel
{
    public function getData()
    {
        $tag = TagQuery::create()->filterByName('home')->findOne();
        if (empty($tag)) {
            return [];
        }

        $postTag = $tag->getPostTags();
        $result = [];
        if (!empty($postTag)) {
            foreach ($postTag as $k => $v) {
                $result[] = $v->getPost()->toArray();
            }
        }
        
        return $result;
    }
}
