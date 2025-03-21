<?php

require_once 'config.php';


class database
{
    private static ?\PDO $db = null;

    public static function db(): \PDO
    {
        if (self::$db === null) {
            $db = new \PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );

            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

            self::$db = $db;
        }

        return self::$db;
    }

    public static function run(string $sql, array $param = []): \PDOStatement
    {
        $statement = self::db()->prepare($sql);

        if (empty($param)) {
            $statement->execute();  
        } else {
            $statement->execute($param);  
        }

        return $statement;
    }

}
