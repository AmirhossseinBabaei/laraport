<?php

declare(strict_types=1);

namespace Core\Database;

require_once "../../config/database.php";

use PDO;
use Exception;
use PDOException;

class Database
{
    private static $databaseInstance = null;

    public static function getInstance()
    {
        if (null == self::$databaseInstance) {
            $databaseInstance = new Database();
            self::$databaseInstance = $databaseInstance->databaseConnection();
        }

        return self::$databaseInstance;
    }


    public static function databaseConnection(): PDO
    {
        $host = DB_HOST;
        $databaseName = DB_DATABASE;
        $databaseUserName = DB_USERNAME;
        $databasePassword = DB_PASSWORD;

        try {
            $pdo = new PDO("mysql:host: $host; dbname=$databaseName", $databaseUserName, $databasePassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }
}