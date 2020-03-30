<?php


namespace Wiki\Catalog\Controllers;


use Wiki\Catalog\Data\Model\{Article, Reference};
use Wiki\Catalog\Data\Repository\ArticleRepository;
use Wiki\Catalog\Data\Repository\ReferenceRepository;

class ReferencesController extends BaseController
{
    private $referenceRepository;
    /**
     * References constructor.
     */
    public function __construct()
    {
        $this->referenceRepository = new ReferenceRepository();
    }

    public function showList()
    {
        $references = $this->referenceRepository->getItems();

        $this->render('list', ['references' => $references]);

    }

    public function create()
    {

        if (!empty($_POST)) {
            $reference = new Reference($_POST['link'], $_POST['content'], $_POST['article_id']);
            $this->referenceRepository->create($reference);

            $this->redirect('/reference/list');
        }
        $this->render('form', ['rout' => '/reference/create', 'articles' => $this->getArticles()]);
    }

    private function getArticles() {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->getItems();

        foreach ($articles as $article) {
            $articlesArr[$article->getId()] = $article->getTitle();
        }
        return $articlesArr;
    }

    public function update()
    {
        $articleReferenceId = $_POST['id'];

        $articleReference = $this->referenceRepository->getItem($articleReferenceId);

        if ($articleReference instanceof Reference) {
            $articleReference->setArticleId($_POST['article_id']);
            $articleReference->setLink($_POST['link']);
            $articleReference->setContent($_POST['content']);
            $this->referenceRepository->update($articleReference);
        }
        $this->redirect('/reference/list');
    }

    public function edit()
    {
        $referenceId = $_GET['id'];

        $reference = $this->referenceRepository->getItem($referenceId);
        $articles = $this->getArticles();

        $this->render('form', ['reference' => $reference, 'rout' => '/reference/update', 'articles' => $articles]);
    }

    public function remove()
    {
        $referenceId = $_GET['id'];

        $result = $this->referenceRepository->delete($referenceId);
        if ($result) {
            $this->redirect('/reference/list');
        } else {
            echo "Delete Error";
        }
    }


    public function addArticle()
    {

    }

    public function getUploadReference()
    {
        $articles = $this->getArticles();
        $this->render('upload_reference', ['articles' => $articles]);
    }

    public function uploadReference()
    {
        if (!empty($_POST['article_id'])) {
            var_dump($_POST['article_id']);
        }
    }

}