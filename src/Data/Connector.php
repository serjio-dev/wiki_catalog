<?php

namespace Wiki\Catalog\Data;

class Connector
{
    private static $pdo;

    public static function init(string $host, int $port, string $db, string $user, string $pass): bool
    {
        if (self::$pdo instanceof \PDO) {
            return false;
        }

        $dsn = 'mysql:host=127.0.0.1;port=3313;dbname=wiki_catalog';
        self::$pdo = new \PDO($dsn, 'root', '123');
        self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        return true;
    }

    public static function getPdo(): \PDO
    {
        return self::$pdo;
    }
}