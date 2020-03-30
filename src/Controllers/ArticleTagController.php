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

            $this->redirect('/article_tag/list');
        }

        $tags = $this->articleTagRepository->getItems();
        $articles = $this->articleRepository->getItems();

        $this->render('form', ['tags' => $tags, 'articles' => $articles, 'rout' => '/article_tag/create']);
    }

    public function update()
    {
        if (!empty($_POST)) {
            $articleTagId = $_POST['id'];
            $articleId = $_POST['article_id'];
            $tagId = $_POST['tag_id'];

            $article_tag = $this->articleTagRepository->getItemArticleTag($articleTagId);
            $tag = $this->articleTagRepository->getItem($tagId);
            $article = $this->articleRepository->getItem($articleId);

            $this->articleTagRepository->updateArticleTag($article_tag, $tag, $article);

            $this->redirect('/article_tag/list');
        }
    }

    public function edit()
    {
        $articleTagId = $_GET['id'];

        $article_tag = $this->articleTagRepository->getItemArticleTag($articleTagId);

        $tags = $this->articleTagRepository->getItems();
        $articles = $this->articleRepository->getItems();

        $this->render('form', ['article_tag' => $article_tag, 'tags' => $tags, 'articles' => $articles, 'rout' => '/article_tag/update']);
    }

    public function remove()
    {
        $article_tag = $_GET['id'];

        $result = $this->articleTagRepository->deleteArticleTag($article_tag);
        if ($result) {
            $this->redirect('/article_tag/list');
        } else {
            echo "Delete Error";
        }

    }

    public function showList()
    {
        $articles_tags = $this->articleTagRepository->getTagsArticle();

        $this->render('list', ['articles_tags' => $articles_tags]);
    }
}