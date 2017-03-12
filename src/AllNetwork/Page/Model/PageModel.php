<?php
namespace AllNetwork\Page\Model;

use Propel\Table\AllNetwork\PostQuery;
use Propel\Table\AllNetwork\PostTagQuery;
use Propel\Table\AllNetwork\TagQuery;
use Propel\Runtime\ActiveQuery\Critera;
use Transformatika\MVC\Model;

class PageModel extends Model
{
    protected $limit = 10;

    protected $page = 1;

    public function getData($options = [])
    {
        $post = PostQuery::create()->filterByStatus('d', Critera::NOT_EQUAL);
        if (isset($options['keyword']) && !empty($options['keyword'])) {
            $post = $post->setQueryKey('filter by title')
                         ->fitlerByTitle($options['keyword']);
        }

        $post = $post->filterByPublishDate([
                            'max' => date('Y-m-d H:i:s')
                        ])->orderByPublishDate('DESC')->paginate($this->page, $this->limit);

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

    public function getDataById($id = null)
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
                                    ->setQueryKey('filter by slug')
                                    ->filterBySlug($slug)
                                    ->findOne();

        $result = [];
        if (!empty($post)) {
            $tags = $post->getTags();
            $result = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'slug' => $post->getSlug(),
                'content' => $post->getContent(),
                'publishDate' => $post->getPublishDate(),
                'createdBy' => $post->getUser()->getName(),
                'createdById' => $post->getCreatedBy(),
                'createdDate' => $post->getCreatedDate(),
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

        $post = PostQuery::create()->usePostTagQuery('a')
                                    ->filterByTagId($tag)
                                    ->endUse()
                                    ->withColumn('a.TagId', 'TagName')
                                    ->find();
        if (empty($post)) {
            return [];
        }

        $result = $post->toArray();
        foreach ($post as $k => $v) {
            $result[$k]['Content'] = strip_tags($v->getContent());
            $result[$k]['PublishDate'] = $v->getPublishDate()->format('l, jS F Y h:i A');
        }

        return $result;
    }
}
