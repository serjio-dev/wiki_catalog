<?php

namespace Wiki\Catalog\Controllers;

use Wiki\Catalog\Data\Repository\ArticleRepository;

class Articles
{
    public function create()
    {

    }

    public function update()
    {

    }

    public function edit()
    {

    }

    public function remove()
    {

    }

    public function showItem()
    {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->getItem(1);

        var_dump($article);
    }

    public function showList()
    {

    }
}