<?php

namespace Wiki\Catalog\Controllers;

use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Repository\ArticleRepository;
use Wiki\Catalog\Data\Repository\ArticleTagRepository;

class ArticleTagController extends BaseController
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var ArticleTagRepository
     */
    private $articleTagRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->articleTagRepository = new ArticleTagRepository();
    }

    public function create()
    {
        if (!empty($_POST)) {
            $articleId = $_POST['article_id'];
            $tagId = $_POST['tag_id'];

            $tag = $this->articleTagRepository->getItem($tagId);
            $article = $this->articleRepository->getItem($articleId);

            $this->articleTagRepository->createLinkArticle($tag, $article);

            //$this->redirect('/article_tag/list');
        }

        $tags = $this->articleTagRepository->getItems();
        $articles = $this->articleRepository->getItems();

        $this->render('form', ['tags' => $tags, 'articles' => $articles, 'rout' => '/article_tag/create']);
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

    public function showList()
    {
        $this->render('list', []);
    }
}