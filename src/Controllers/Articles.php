<?php

namespace Wiki\Catalog\Controllers;

use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Repository\ArticleRepository;

class Articles extends BaseController
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function create()
    {
        $article = new Article('title','url', 'content');
        $result = $this->articleRepository->create($article);
        var_dump($result);
    }

    public function update()
    {
        $articleId = 1;
        $result = null;

        $article = $this->articleRepository->getItem($articleId);
        if ($article instanceof Article) {
            $article->setContent('content updated at '.gmdate('Y-m-d H:i:s'));
            $result = $this->articleRepository->update($article);
        }
    }

    public function edit()
    {
        $articleId = $_GET['id'];
        $article = $this->articleRepository->getItem($articleId);

        var_dump($article);
        var_dump($article->getTitle());

        $this->render('edit', ['article' => $article, 'title' => 'Hi!!!']);
    }

    public function remove($id = 1)
    {
        $result = $this->articleRepository->delete($id);
        var_dump($result);
    }

    public function showItem($id = 1)
    {
        $article = $this->articleRepository->getItem($id);
        var_dump($article);
    }

    public function showList()
    {
        $articles = $this->articleRepository->getList();
        var_dump($articles);
    }
}