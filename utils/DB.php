<?php

require 'DotEnv.php';

/**
 * DB class
 * This class will handle database queries
 * @author Ishmael Salvador <irsalvador06@gmail.com>
 * @since 2024.03.14
 **/
class DB
{
    private $pdo;
    private static $instance = null;

    private function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                (new DotEnv(__DIR__ . '/../.env'))->load();
                $dsn = 'mysql:dbname=' . getenv('DB_NAME') . ';host=' . getenv('DB_HOST');
                $user = getenv('DB_USER');
                $password = getenv('DB_PASS');
                $pdo = new \PDO($dsn, $user, $password);
                self::$instance = new self($pdo);
            } catch(PDOExcetion $e) {
                $error = $e->getMessage();
                echo $error;
            }
        }
        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}