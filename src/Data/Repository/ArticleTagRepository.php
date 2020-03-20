<?php

namespace Wiki\Catalog\Data\Repository;

use Wiki\Catalog\Data\Model\ArticleTag;
use Wiki\Catalog\Data\Model\ModelInterface;

class ArticleTagRepository extends Repository implements RepositoryCrudInterface
{
    /**
     * @param int $id
     * @return ModelInterface|null
     */
    public function getItem(int $id): ?ModelInterface
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

        return $res ?? [];
    }

    public function create(ModelInterface $articleTag): bool
    {
        $stm = $this->getPdo()->prepare('INSERT INTO tags (name, key) VALUES (:name, :key)');

        $stm->bindValue('name', $articleTag->getName(), \PDO::PARAM_STR);
        $stm->bindValue('key', $articleTag->getKey(), \PDO::PARAM_STR);

        return $stm->execute();
    }

    public function update(ModelInterface $articleTag): bool
    {
        $stm = $this->getPdo()->prepare("UPDATE Customers SET name = ':name', key ':key' WHERE id = :id");

        $stm->bindValue('id', $articleTag->getId(), \PDO::PARAM_INT);
        $stm->bindValue('name', $articleTag->getName(), \PDO::PARAM_STR);
        $stm->bindValue('key',  $articleTag->getKey(), \PDO::PARAM_STR);

        return $stm->execute();
    }

    public function delete(int $id): bool
    {
        $stm = $this->getPdo()->query('DELETE FROM tags WHERE (:id, :key)');
        $stm->bindValue('id', $id, \PDO::PARAM_INT);

        return $stm->execute();
    }
}
