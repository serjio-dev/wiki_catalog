<?php

namespace Wiki\Catalog\Data\Repository;

use Wiki\Catalog\Data\Model\Article;
use Wiki\Catalog\Data\Model\ArticleTag;
use Wiki\Catalog\Data\Model\Tag;
use Wiki\Catalog\Data\Model\ModelInterface;

class ArticleTagRepository extends Repository implements RepositoryCrudInterface
{
    /**
     * @param int $id
     * @return Tag|null
     */
    public function getItem(int $id): ?ModelInterface
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM tags WHERE id = :id');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Tag::class);

        $stm->bindValue('id', $id, \PDO::PARAM_INT);
        $stm->execute();
        $res = $stm->fetch();

        return $res ?? null;
    }

    public function getItems(): array
    {
        $stm = $this->getPdo()->query('SELECT * FROM `tags`');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Tag::class);

        return $stm->fetchAll() ?? [];
    }

    public function create(ModelInterface $articleTag): bool
    {
        $stm = $this->getPdo()->prepare('INSERT INTO `tags` (`name`, `key`) VALUES (:name, :key)');

        $stm->bindValue('name', $articleTag->getName(), \PDO::PARAM_STR);
        $stm->bindValue('key', $articleTag->getKey(), \PDO::PARAM_STR);

        return $stm->execute();
    }

    public function update(ModelInterface $articleTag): bool
    {
        $stm = $this->getPdo()->prepare("UPDATE `tags` SET `name`=:name, `key`=:key WHERE id = :id");

        $stm->bindValue('id', $articleTag->getId(), \PDO::PARAM_INT);
        $stm->bindValue('name', $articleTag->getName(), \PDO::PARAM_STR);
        $stm->bindValue('key',  $articleTag->getKey(), \PDO::PARAM_STR);

        return $stm->execute();
    }

    public function delete(int $id): bool
    {
        $stm = $this->getPdo()->prepare('DELETE FROM `tags` WHERE id = :id');
        $stm->bindValue('id', $id, \PDO::PARAM_INT);

        return $stm->execute();
    }

    public function createLinkArticle(Tag $articleTag, Article $article)
    {
        $stm = $this->getPdo()->prepare('INSERT INTO `tags_articles` (`tag_id`, `article_id`) VALUES (:tag_id, :article_id)');

        $stm->bindValue('tag_id', $articleTag->getId(), \PDO::PARAM_INT);
        $stm->bindValue('article_id', $article->getId(), \PDO::PARAM_INT);

        return $stm->execute();
    }

    public function getTagsArticle(): array
    {
        $stm = $this->getPdo()->query('SELECT * FROM `tags_articles`');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, ArticleTag::class);

        return $stm->fetchAll() ?? [];
    }

    public function deleteArticletag($id)
    {
        $stm = $this->getPdo()->prepare('DELETE FROM `tags_articles` WHERE id = :id');
        $stm->bindValue('id', $id, \PDO::PARAM_INT);

        return $stm->execute();
    }

    public function getItemArticleTag($id)
    {
        $stm = $this->getPdo()->prepare('SELECT * FROM `tags_articles` WHERE id = :id');
        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, ArticleTag::class);

        $stm->bindValue('id', $id, \PDO::PARAM_INT);
        $stm->execute();
        $res = $stm->fetch();

        return $res ?? null;
    }

    public function updateArticleTag(ArticleTag $articleTag, Tag $tag, Article $article)
    {
        $stm = $this->getPdo()->prepare("UPDATE `tags_articles` SET `tag_id`=:tagId, `article_id`=:articleId WHERE id = :id");

        $stm->bindValue('id', $articleTag->getId(), \PDO::PARAM_INT);
        $stm->bindValue('tagId', $tag->getId(), \PDO::PARAM_INT);
        $stm->bindValue('articleId',  $article->getId(), \PDO::PARAM_INT);

        return $stm->execute();
    }

}
