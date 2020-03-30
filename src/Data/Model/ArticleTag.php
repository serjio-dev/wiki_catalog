<?php


namespace Wiki\Catalog\Data\Model;


use Wiki\Catalog\Data\Repository\ArticleRepository;
use Wiki\Catalog\Data\Repository\ArticleTagRepository;

class ArticleTag implements ModelInterface
{
    private $tag_id;
    private $article_id;
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param mixed $tag_id
     */
    public function setTagId($tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    public function getArticleTitle()
    {
        $article = new ArticleRepository();
        return $article->getItem($this->article_id)->getTitle();
    }

    public function getTagName()
    {
        $tag = new ArticleTagRepository();
        return $tag->getItem($this->tag_id)->getName();
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @param mixed $article_id
     */
    public function setArticleId($article_id): void
    {
        $this->article_id = $article_id;
    }


}