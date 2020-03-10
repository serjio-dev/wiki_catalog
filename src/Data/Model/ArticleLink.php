<?php

namespace Wiki\Catalog\Data\Model;

class ArticleLink
{
    private $id;
    private $title;
    private $anchor;
    private $articleId;

    /**
     * ArticleLink constructor.
     * @param string $title
     * @param string $anchor
     * @param Article $article\
     */
    public function __construct(string $title, string $anchor, Article $article)
    {
        $this->title = $title;
        $this->anchor = $anchor;
        $this->articleId = $article->getId();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * @param mixed $anchor
     */
    public function setAnchor($anchor): void
    {
        $this->anchor = $anchor;
    }

}