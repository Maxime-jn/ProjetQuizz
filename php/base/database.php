<?php

require_once 'constants.php';

/*

Leart Demiri
11.12.2024

Classe database
*/


class database
{
    // Propriété
    private static ?PDO $db = null;

    // Méthodes
    public static function db(): PDO
    {
        if (self::$db === null) {
            try {
                $db = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                    DB_USER,
                    DB_PASS
                );

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (Throwable $th) {
                die("Cannot connect to database");
            }

            self::$db = $db;
        }

        return self::$db;
    }

    public static function run(string $sql, array $param = []): PDOStatement
    {
        $statement = self::db()->prepare($sql);

        $result = $statement->execute($param);

        return $statement;
    }

    public static function begin(){
        return self::db()->beginTransaction();
    }

    public static function commit(){
        return self::db()->commit();
    }

    public static function rollback(){
        return self::db()->rollBack();
    }

    public static function lastInsertId(){
        return self::db()->lastInsertId();
    }
}