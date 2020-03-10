<?php

namespace Wiki\Catalog\Data\Repository;

use Wiki\Catalog\Data\Model\Article;

class ArticleRepository extends Repository
{
    public function getItem(int $id): ?Article
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM articles WHERE id = :id');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Article::class);

        $stm->bindValue('id', $id, \PDO::PARAM_INT);
        $stm->execute();
        $res = $stm->fetch();


        return $res ?? null;
    }

    public function getItems(): array
    {

    }

    public function create(Article $article): Article
    {

    }

    public function update(Article $article): bool
    {

    }

    public function delete(int $id): bool
    {

    }
}