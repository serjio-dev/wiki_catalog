<?php


namespace Wiki\Catalog\Controllers;


use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Model\ArticleReference;
use Wiki\Catalog\Data\Repository\ReferenceRepository;

class References
{
    public function getList()
    {
        $referenceRepository = new ReferenceRepository();
        $references = $referenceRepository->getList();

        var_dump($references);

    }

    public function create()
    {
        $article = new Article();  //?

        $articalReference = new ArticleReference($_POST['link'], $_POST['content'], $article);
        $referenceRepository = new ReferenceRepository();
        $reference = $referenceRepository->create($articalReference);
        var_dump($reference);
    }

    public function update($id)
    {
        $article = new Article(); // ?

        $articalReference = new ArticleReference($_POST['link'], $_POST['content'], $article);
        $articalReference->setId($id);
        $referenceRepository = new ReferenceRepository();
        $reference = $referenceRepository->update($articalReference);
        var_dump($reference);

    }

    public function delete($id)
    {
        $referenceRepository = new ReferenceRepository();
        $reference = $referenceRepository->delete($id);

        var_dump($reference);
    }

    public function showItem($id)
    {
        $referenceRepository = new ReferenceRepository();
        $reference = $referenceRepository->get($id);

        var_dump($reference);
    }

    public function addArticle()
    {

    }
}