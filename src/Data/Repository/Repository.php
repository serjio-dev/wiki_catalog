<?php

namespace Wiki\Catalog\Data\Repository;

use Wiki\Catalog\Data\Connector;

class Repository
{
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connector::getPdo();
    }

    /**
     * @return \PDO
     */
    final protected function getPdo(): \PDO
    {
        return $this->pdo;
    }
}