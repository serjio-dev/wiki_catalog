<?php


namespace Wiki\Catalog\Data\Model;


use Wiki\Catalog\Data\Repository\ArticleRepository;

class Reference implements ModelInterface
{
    private $id;
    private $article_id;
    private $link;
    private $content;
    private $article_title;

    /**
     * References constructor.
     * @param string $link
     * @param string $content
     * @param int $article_id
     */
    public function __construct(string $link = null, string $content = null, $article_id = null)
    {
        $this->link = $link;
        $this->content = $content;
        $this->article_id = $article_id;

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
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @param mixed $articleId
     */
    public function setArticleId($article_id): void
    {
        $this->article_id = $article_id;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getArticleTitle()
    {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getItem($this->article_id);
        $this->article_title = $article->getTitle();
        return $this->article_title;
    }
    
    


}