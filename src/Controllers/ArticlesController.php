<?php

namespace Wiki\Catalog\Controllers;

use GuzzleHttp\Client;

use phpQuery;
use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Repository\ArticleRepository;

class ArticlesController extends BaseController
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
        if (!empty($_POST)) {
            $article = new Article($_POST['title'],$_POST['url'], $_POST['content']);
            $this->articleRepository->create($article);

            $this->redirect('/article/list');
        }
        $this->render('form', ['rout' => '/article/create']);
    }

    public function update()
    {
        $articleId = $_POST['id'];

        $article = $this->articleRepository->getItem($articleId);
        if ($article instanceof Article) {
            $article->setContent($_POST['content']);
            $article->setTitle($_POST['title']);
            $article->setUrl($_POST['url']);
            $result = $this->articleRepository->update($article);
        }

        $this->redirect('/article/list');
    }

    public function edit()
    {
        $articleId = $_GET['id'];
        $article = $this->articleRepository->getItem($articleId);

        $this->render('form', ['article' => $article, 'rout' => '/article/update']);
    }

    public function remove()
    {
        $id = $_GET['id'];
        $result = $this->articleRepository->delete($id);
        if ($result) {
            $this->redirect('/article/list');
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

    public function getUploadUrl()
    {
        $this->render('upload_url');
    }

    public function uploadArticle()
    {
        if ($url = $_POST['url']) {
            var_dump($url);

            $client = new Client();

            $request = $client->get($url);

            var_dump($request->getStatusCode());

            $stream = $request->getBody();

            $htmlContent = $stream->getContents();

            $document = phpQuery::newDocument($htmlContent);

            $heading = $document->find('h1#firstHeading');//->text();
            //$content = $document->find('div#bodyContent');


            var_dump($heading);
           // var_dump($content);

            exit();

            foreach ($hentry as $el) {
                $pq = pq($el); // Это аналог $ в jQuery
                $pq->find('h2.entry-title > a.blog')->attr('href', 'http://%username%.habrahabr.ru/blog/')->html('%username%'); // меняем атрибуты найденого элемента
                $pq->find('div.entry-info')->remove(); // удаляем ненужный элемент
                $tags = $pq->find('ul.tags > li > a');
                $tags->append(': ')->prepend(' :'); // добавляем двоеточия по бокам
                $pq->find('div.content')->prepend('<br />')->prepend($tags); // добавляем контент в начало найденого элемента
            }
        }

        $this->redirect('/article/list');
    }
}