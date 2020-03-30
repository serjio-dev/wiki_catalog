<?php

namespace Wiki\Catalog\Controllers;

use Wiki\Catalog\Data\Model\Tag;
use Wiki\Catalog\Data\Repository\ArticleTagRepository;

class TagsController extends BaseController
{
    private $articleTagRepository;
    /**
     * TagsController constructor.
     */
    public function __construct()
    {
        $this->articleTagRepository = new ArticleTagRepository();
    }

    public function showList()
    {
        $tags = $this->articleTagRepository->getItems();

        $this->render('list', ['tags' => $tags]);
    }

    public function create()
    {
        if (!empty($_POST)) {
            $tag = new Tag($_POST['name'], $_POST['key']);
            $this->articleTagRepository->create($tag);
            
            $this->redirect('/tag/list');
        }
        
        $this->render('form', ['rout' => '/tag/create']);
    }

    public function edit()
    {
        $tagId = $_GET['id'];

        $tag = $this->articleTagRepository->getItem($tagId);

        $this->render('form', ['tag' => $tag, 'rout' => '/tag/update']);
    }

    public function update()
    {
        $tagId = $_POST['id'];

        $articleTag = $this->articleTagRepository->getItem($tagId);

        if ($articleTag instanceof Tag) {
            $articleTag->setName($_POST['name']);
            $articleTag->setKey($_POST['key']);
            $this->articleTagRepository->update($articleTag);
        }
        $this->redirect('/tag/list');
    }

    public function remove()
    {
        $tagId = $_GET['id'];

        $result = $this->articleTagRepository->delete($tagId);
        if ($result) {
            $this->redirect('/tag/list');
        } else {
            echo "Delete Error";
        }

    }

    public function addArticle()
    {

    }
}