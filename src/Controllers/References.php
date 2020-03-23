<?php


namespace Wiki\Catalog\Controllers;


use Wiki\Catalog\Data\Model\{Article, ArticleReference};
use Wiki\Catalog\Data\Repository\ReferenceRepository;

class References extends BaseController
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
        $references = $this->referenceRepository->getList();

        var_dump($references);

    }

    public function create()
    {
        $article = new Article();  //?

        $articalReference = new ArticleReference($_POST['link'], $_POST['content'], $article);
        $reference = $this->referenceRepository->create($articalReference);
        var_dump($reference);
    }

    public function update($id)
    {
        $article = new Article(); // ?

        $articalReference = new ArticleReference($_POST['link'], $_POST['content'], $article);
        $articalReference->setId($id);
        $reference = $this->referenceRepository->update($articalReference);
        var_dump($reference);

    }

    public function delete($id)
    {
        $reference = $this->referenceRepository->delete($id);

        var_dump($reference);
    }

    public function showItem($id)
    {
        $reference = $this->referenceRepository->get($id);

        var_dump($reference);
    }

    public function addArticle()
    {

    }
}