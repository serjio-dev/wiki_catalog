<?php

namespace Wiki\Catalog\Controllers;

use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Repository\ArticleRepository;

class Articles
{
    public function create()
    {
        $article = new Article('title','url', 'content');
        $article->setId('1');
        $articleRepository = new ArticleRepository();
        $result = $articleRepository->create($article);
        var_dump($result);
    }

    public function update()
    {
        $article = new Article(
            'title',
            'url',
            'content updated at '.gmdate('Y-m-d H:i:s')
        );
        $article->setId('1');
        $articleRepository = new ArticleRepository();
        $result = $articleRepository->update($article);
        var_dump($result);
    }

    public function edit()
    {

    }

    public function remove($id = 1)
    {
        $articleRepository = new ArticleRepository();
        $result = $articleRepository->delete($id);
        var_dump($result);
    }

    public function showItem($id = 1)
    {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->get($id);
        var_dump($article);
    }

    public function showList()
    {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->getList();
        var_dump($articles);
    }
}