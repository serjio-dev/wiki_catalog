<?php

namespace Wiki\Catalog\Data\Repository;

use Wiki\Catalog\Data\Model\ModelInterface;

interface RepositoryCrudInterface
{
    public function getItem(int $id): ?ModelInterface;

    public function getItems(): array;

    public function create(ModelInterface $model): bool;

    public function update(ModelInterface $model): bool;

    public function delete(int $id): bool;
}