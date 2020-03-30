<?php

namespace Wiki\Catalog\Data\Model;

class Menu
{
    private $id;
    private $name;
    private $parentId;
    private $articleId;

    /**
     * ArticleMenu constructor.
     * @param $name
     * @param Menu $parent
     * @param Article $article
     */
    public function __construct($name, Menu $parent, Article $article)
    {
        $this->name = $name;
        $this->parentId = $parent->getId();
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}