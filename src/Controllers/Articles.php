<?php

namespace Wiki\Catalog\Controllers;

use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Repository\ArticleRepository;

class Articles extends BaseController
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

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
        $articleId = $_GET['id'];

        $article = $this->articleRepository->getItem($articleId);
        if ($article instanceof Article) {
            $article->setContent($_GET['content']);
            $article->setTitle($_GET['title']);
            $article->setUrl($_GET['url']);
            $result = $this->articleRepository->update($article);
        }
        $this->showList();
    }

    public function edit()
    {
        $articleId = $_GET['id'];
        $article = $this->articleRepository->getItem($articleId);

        $this->render('edit', ['article' => $article]);
    }

    public function remove()
    {
        $id = $_GET['id'];
        $result = $this->articleRepository->delete($id);
        if ($result) {
            $this->showList();
        } else {
            echo "Delete Error";
        }

    }

    public function showItem($id = 1)
    {
        $article = $this->articleRepository->getItem($id);
        var_dump($article);
    }

    public function showList()
    {
        $articles = $this->articleRepository->getItems();

        $this->render('list', ['articles' => $articles]);
    }
}