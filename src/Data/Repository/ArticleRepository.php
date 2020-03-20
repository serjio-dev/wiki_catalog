<?php

namespace Wiki\Catalog\Data\Repository;

use PDO;
use Wiki\Catalog\Data\Model\Article;

class ArticleRepository extends Repository
{
    public function get(int $id): ?Article
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM articles WHERE id = :id');
        $stm->setFetchMode(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE, Article::class);
        $stm->bindValue('id', $id, PDO::PARAM_INT);
        $stm->execute();
        $res = $stm->fetch();

        return $res ?? null;
    }

    public function getList(): array
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM articles');
        $stm->setFetchMode(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE, Article::class);
        $stm->execute();
        $res = $stm->fetchAll();

        return $res ?? null;
    }

    public function create(Article $article): bool
    {
        $stm = $this->getPdo()->prepare('
            INSERT INTO articles 
            (id, title, url, content)  
            values (:id, :title, :url, :content)
        ');
        $stm->setFetchMode(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE, Article::class);
        $stm->bindValue('id', $article->getId(), PDO::PARAM_INT);
        $stm->bindValue('title', $article->getTitle(), PDO::PARAM_STR);
        $stm->bindValue('url', $article->getUrl(), PDO::PARAM_STR);
        $stm->bindValue('content', $article->getContent(), PDO::PARAM_STR);
        $stm->execute();
        return $stm->rowCount() > 0 ? true : false;
    }

    public function update(Article $article): bool
    {
        $stm = $this->getPdo()->prepare('
            UPDATE articles 
            SET id=:id, title=:title, url=:url, content=:content 
            WHERE id=:id
        ');
        $stm->setFetchMode(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE, Article::class);
        $stm->bindValue('id', $article->getId(), PDO::PARAM_INT);
        $stm->bindValue('title', $article->getTitle(), PDO::PARAM_STR);
        $stm->bindValue('url', $article->getUrl(), PDO::PARAM_STR);
        $stm->bindValue('content', $article->getContent(), PDO::PARAM_STR);
        $stm->execute();
        return $stm->rowCount() > 0 ? true : false;
    }

    public function delete(int $id): bool
    {
        $stm = $this->getPdo()->prepare('DELETE FROM articles WHERE id = :id');
        $stm->setFetchMode(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE, Article::class);
        $stm->bindValue('id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount() > 0 ? true : false;
    }
}