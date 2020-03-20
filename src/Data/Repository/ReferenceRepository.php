<?php


namespace Wiki\Catalog\Data\Repository;


use Wiki\Catalog\Data\Model\ArticleReference;

class ReferenceRepository extends Repository
{
    public function get(int $id): ?ArticleReference
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM `references` WHERE id : id');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, ArticleReference::class);

        $stm->bindValue('id', $id, \PDO::PARAM_INT);
        $stm->execute();
        $res = $stm->fetch();



        return $res ?? null;
    }

    public function getList(): ?array
    {
        $stm = $this->getPdo()->query('SELECT * FROM `references`');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, ArticleReference::class);

        $res = $stm->fetchAll();



        return $res ?? null;
    }

    public function delete($id): bool
    {
        $stm = $this->getPdo()->prepare('DELETE * FROM `references` WHERE id : id');

        $stm->bindValue('id', $id, \PDO::PARAM_INT);
        return $stm->execute();
    }

    public function create($model): bool
    {
        $stm = $this->getPdo()->prepare('INSERT INTO `references`(link, content, article_id) VALUES (:link, :content, :article_id)');
        $stm->bindValue('link', $model->getLink(), \PDO::PARAM_STR);
        $stm->bindValue('content', $model->getContent(), \PDO::PARAM_STR);
        $stm->bindValue('article_id', $model->getArticleId(), \PDO::PARAM_INT);

        return $stm->execute();
    }

    public function update($model): bool
    {
        $stm = $this->getPdo()->prepare('UPDATE `references` SET link=:link, content=:content, article_id=:article_id WHERE id=:id');
        $stm->bindValue('link', $model->getLink(), \PDO::PARAM_STR);
        $stm->bindValue('content', $model->getContent(), \PDO::PARAM_STR);
        $stm->bindValue('article_id', $model->getArticleId(), \PDO::PARAM_INT);
        $stm->bindValue('id', $model->getId(), \PDO::PARAM_INT);

        return $stm->execute();
    }

}