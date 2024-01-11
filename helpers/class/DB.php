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
                'mysql:host=localhost;port=3306;dbname=lightninghub',
                'root',
                '',
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

    public static function update(
        string $table,
        array $data,
        int|string|null $identifier = null,
        $identifierName = 'id'
    ): bool {
        // Check identifier and remove it from data
        $identifier = $identifier ?? $data[$identifierName] ?? null;
        unset($data[$identifierName]);
        if (empty($identifier)) {
            return false;
        }

        // Generate updates part of sql query

        // only keys: ['enable', 'label', 'description', 'brand', 'price_ttc', 'price_ht', 'vat', 'quantity', 'created_at']
        $keys = array_keys($data);

        // "enable = :enable, label = :label, description = :description, brand = :brand, price_ttc = :price_ttc, price_ht = :price_ht, vat = :vat, quantity = :quantity, created_at = :created_at"
        $updates = [];
        foreach ($keys as $key) {
            $updates[] = "$key = :$key";
        }
        $updates = implode(', ', $updates);

        // Inject identifier in data
        $data[$identifierName] = $identifier;

        return DB::statement(
            "UPDATE $table SET $updates"
            ." WHERE $identifierName = :$identifierName",
            $data,
        );
    }

    public static function insert(string $table, array $data): bool
    {
        // only keys: ['enable', 'label', 'description', 'brand', 'price_ttc', 'price_ht', 'vat', 'quantity', 'created_at']
        $keys = array_keys($data);

        // enable, label, description, brand, price_ttc, price_ht, vat, quantity, created_at
        $cols = implode(', ', $keys);

        // :enable, :label, :description, :brand, :price_ttc, :price_ht, :vat, :quantity, :created_at
        $params = ':'.implode(', :', $keys);

        return DB::statement(
            "INSERT INTO $table ($cols)"
            ." VALUES ($params)",
            $data,
        );
    }
}
