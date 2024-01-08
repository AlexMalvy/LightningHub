<?php

class DB {
    private static ?PDO $db = null; // "?PDO" allowed only on PHP 8.1+

    public static function getDB() 
    {
        if (self::$db === null) {
            self::$db = self::connection();
        }

        return self::$db;
    }

    public static function fetch(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
        int $fetchType = PDO::FETCH_ASSOC,
    ) : array|false {
        return self::runQuery($sql, $params, $limit, $offset, true, $fetchType);
    }

    public static function statement(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
    ) : int|false {
        return self::runQuery($sql, $params, $limit, $offset,  false);
    }

    protected static function runQuery(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
        bool $fetchMode = true,
        int $fetchType = PDO::FETCH_ASSOC,
    ) : array|bool|int {
        try {
            // Add Limit to sql
            if ($limit !== null) {
                $sql .= " LIMIT :limitation";
            }

            // Add Offset to sql
            if ($offset !== null) {
                $sql .= " OFFSET :offset";
            }

            // Prepare sql query
            $req = self::getDB()->prepare($sql);

            // Bind Limit
            if ($limit !== null) {
                $req->bindValue(':limitation', $limit, PDO::PARAM_INT);
            }

            // Bind Offset
            if ($offset !== null) {
                $req->bindValue(':offset', $offset, PDO::PARAM_INT);
            }

            // Bind params
            foreach ($params as $key => $value) {
                $req->bindValue($key, $value);
            }

            // Execute query
            $result = $req->execute();

            // Check result
            if ($result === false) {
                throw new Exception(self::getDB()->errorInfo()[2] ?? 'Unknown error');
            }

            return $fetchMode ? $req->fetchAll($fetchType) : $req->rowCount();
        } catch (Exception $e) {
            // TODO Write error message in a independent log file
            echo 'Erreur : '.$e->getMessage(); exit();
        }

        return false;
    }

    protected static function connection() 
    {
        try {
            return new PDO(
            "mysql:host=localhost;port=3306;dbname=lightninghub",
            "lightninghubadmin",
            "lightninghubcorporation",
                [
                    // Options
                    PDO::ATTR_PERSISTENT => true,
                ]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    
        return null;
    }
}
