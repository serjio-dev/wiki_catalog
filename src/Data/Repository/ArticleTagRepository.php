<?php

namespace Wiki\Catalog\Data\Repository;

use Wiki\Catalog\Data\Model\Article;

class ArticleTagRepository extends Repository
{
    public function getItem(int $id): ?ArticleTag
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM tags WHERE id = :id');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, ArticleTag::class);

        $stm->bindValue('id', $id, \PDO::PARAM_INT);
        $stm->execute();
        $res = $stm->fetch();

        return $res ?? null;
    }

    public function getItems(): array
    {
        $stm = $this->getPdo()->query('SELECT * FROM tags WHERE');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, ArticleTag::class);

        $res = $stm->fetchAll();

        return $res;
    }

    public function create(ArticleTag $articleTag): bool
    {

        $stm = $this->getPdo()->prepare('INSERT INTO tags (name, key) VALUES (:name, :key)');

        $stm->bindValue('name', $articleTag->name, \PDO::PARAM_STR);
        $stm->bindValue('key', $articleTag->key, \PDO::PARAM_STR);

        $stm->execute();

    }

    public function update(ArticleTag $articleTag): bool
    {

    }

    public function delete(int $id): bool
    {

    }
}