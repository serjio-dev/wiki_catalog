<?php


namespace Wiki\Catalog\Data\Model;


class ArticleReference
{
    private $id;
    private $article_id;
    private $link;
    private $content;

    /**
     * References constructor.
     * @param string $link
     * @param string $content
     * @param Article $article
     */
    public function __construct(string $link = null, string $content = null, Article $article = null)
    {
        if ($link && $content && $article) {
            $this->link = $link;
            $this->content = $content;
            $this->article_id = $article->getId();
        }

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
    
    


}