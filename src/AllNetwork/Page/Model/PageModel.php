<?php
namespace AllNetwork\Page\Model;

use Propel\Table\AllNetwork\PostQuery;
use Propel\Table\AllNetwork\TagQuery;
use Propel\Runtime\ActiveQuery\Critera;
use Transformatika\MVC\Model;

class PageModel extends Model
{
    protected $limit = 10;

    protected $page = 1;

    public function getData()
    {
        $post = PostQuery::create()->filterByStatus('d', Critera::NOT_EQUAL)
                                    ->filterByPublishDate(
                                        [
                                            'max' => date('Y-m-d H:i:s')
                                        ]
                                    )
                                    ->orderByPublishDate('DESC')
                                    ->find();
        
        $result = [];
        foreach ($post as $k => $v) {
            $tags = $v->getTags();
            $result[] = [
                'id' => $v->getId(),
                'title' => $v->getTitle(),
                'slug' => $v->getSlug(),
                'content' => $v->getContent(),
                'publishDate' => $v->getPublishDate(),
                'createdBy' => $v->getUser()->getName(),
                'createdById' => $v->getCreatedBy(),
                'createdDate' => $v->getCreatedDate(),
                'tags' => empty($tags) ? [] : $tags->toArray()
            ];
        }

        return $result;
    }

    public function getDataById($id)
    {
        $post = PostQuery::create()->filterByStatus('d', Critera::NOT_EQUAL)
                                    ->filterById($id)
                                    ->find();
        
        $result = [];
        foreach ($post as $k => $v) {
            $tags = $v->getTags();
            $result[] = [
                'id' => $v->getId(),
                'title' => $v->getTitle(),
                'slug' => $v->getSlug(),
                'content' => $v->getContent(),
                'publishDate' => $v->getPublishDate(),
                'createdBy' => $v->getUser()->getName(),
                'createdById' => $v->getCreatedBy(),
                'createdDate' => $v->getCreatedDate(),
                'tags' => empty($tags) ? [] : $tags->toArray()
            ];
        }

        return $result;
    }

    public function getDataBySlug($slug)
    {
         $post = PostQuery::create()->filterByStatus('d', Critera::NOT_EQUAL)
                                    ->filterBySlug($sslug)
                                    ->find();
        
        $result = [];
        foreach ($post as $k => $v) {
            $tags = $v->getTags();
            $result[] = [
                'id' => $v->getId(),
                'title' => $v->getTitle(),
                'slug' => $v->getSlug(),
                'content' => $v->getContent(),
                'publishDate' => $v->getPublishDate(),
                'createdBy' => $v->getUser()->getName(),
                'createdById' => $v->getCreatedBy(),
                'createdDate' => $v->getCreatedDate(),
                'tags' => empty($tags) ? [] : $tags->toArray()
            ];
        }

        return $result;
    }

    public function getDataByTag($tag = '')
    {
        if (empty($tag)) {
            return $this->getData();
        }

        $tag = TagQuery::create()->filterByName($tag)->findOne();
        if (empty($tag)) {
            return [];
        }

        $post = $tag->getPosts();
        $result = [];
        foreach ($post as $k => $v) {
            $tags = $v->getTags();
            $result[] = [
                'id' => $v->getId(),
                'title' => $v->getTitle(),
                'slug' => $v->getSlug(),
                'content' => $v->getContent(),
                'publishDate' => $v->getPublishDate(),
                'createdBy' => $v->getUser()->getName(),
                'createdById' => $v->getCreatedBy(),
                'createdDate' => $v->getCreatedDate(),
                'tags' => empty($tags) ? [] : $tags->toArray()
            ];
        }

        return $result;
    }
}