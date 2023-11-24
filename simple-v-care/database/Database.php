<?php

declare(strict_types=1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$config = require_once base_path('config.php');

class Database
{
    private static ?mysqli $mysql = null;
    private static ?array $config = null;
    private static ?Database $db = null; // to make sure that we have only one instance of the database (singleton pattern   )

    private $migrations_sql = null;
    private $stmt = null;

    private function __construct(array $config)
    {
        self::$config = $config;

        try {
            // dd(self::$config);
            self::$mysql = new mysqli(self::$config['hostname'], self::$config['username'], self::$config['password'], self::$config['database'], self::$config['port']);
        } catch (mysqli_sql_exception $e) {
            throw new mysqli_sql_exception($e->getMessage(), $e->getCode());
        }
    }

    public static function create(array $config): Database
    {
        if (self::$db !== null)
            return self::$db;

        self::$db = new self($config);

        return self::$db;
    }

    /* ============================= Migrations ======================= */
    public function migrations($sql): Database
    {
        $this->migrations_sql = $sql;
        return $this;
    }

    public function migrate(): void
    {
        self::$mysql->query($this->migrations_sql);
    }

    /* ============================= CRUD ======================= */

    /**
     * Return the id of the last inserted row ['LAST_INSERT_ID()']
     */
    public function insert($table, array $data): array
    {
        // dd($data);
        $columns = array_keys($data);
        $columns = implode(',', $columns);

        $values = array_values($data);

        foreach ($values as &$value) {
            if (is_string($value))
                $value = "'$value'";
            if (is_null($value))
                $value = "NULL";
        }

        $values = implode(',', $values);

        $query_sql = "INSERT INTO $table ($columns) VALUES ($values);";
        // dd($query_sql);

        $this->stmt = self::$mysql->query("$query_sql");

        return self::$mysql->query('SELECT LAST_INSERT_ID()')->fetch_assoc();
    }

    public function update(string $table, array $data_assoc, $id): bool
    {
        $stmts = "";
        for ($i = 0; $i < count($data_assoc); $i++) {
            $key = array_keys($data_assoc)[$i];
            $value = array_values($data_assoc)[$i];

            if (is_string($value))
                $value = "'$value'";


            if ($i != count($data_assoc) - 1)
                $stmts .= "`$key` = $value, ";
            else
                $stmts .= "`$key` = $value";

        }
        // dd("UPDATE $table SET {$stmts} WHERE id = $id");
        $this->stmt = self::$mysql->query("UPDATE $table SET {$stmts} WHERE id = $id");
        return $this->stmt;
    }

    public function delete($table, $id): bool
    {
        $this->stmt = self::$mysql->query("DELETE FROM $table WHERE id = $id");
        return $this->stmt;
    }

    /**
     * Get Data From Table
     */
    public function select($table, $columns = '*'): array
    {
        $this->stmt = self::$mysql->query("SELECT $columns FROM $table");
        return $this->stmt->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Get Data From Table Where Column = Value
     * Get Some Rows From Table
     */
    public function where($table, $column, $value, $columns = '*'): array
    {
        global $database;

        // dd("SELECT $columns FROM $table WHERE $column = $value");

        // Way 1
        $this->stmt = $database->sql("SELECT $columns FROM $table WHERE $column = ?")->run('s', $value);
        return $this->stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        // Way 2
        // $this->stmt = self::$mysql->query("SELECT {$columns} FROM {$table} WHERE {$column} = ?", [$value]);
        // return $this->stmt->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Get All Data From Table
     * Alias for select()
     */
    public function all($table, $columns = '*'): array
    {
        return $this->select($table, $columns);
    }

    /* ============================= SQL ======================= */
    public function sql($sql): Database
    {
        $this->stmt = self::$mysql->prepare($sql);
        return $this;
    }

    public function run(string $types, &...$params): mysqli_stmt
    {
        $this->stmt->bind_param($types, ...$params);
        $this->stmt->execute();
        return $this->stmt;
    }

    public function fetch($fetch_callback)
    {
        $result = $this->stmt->get_result();
        return $fetch_callback($result);
    }

    // JOIN

    /**
     * Inner Join
     */
    public function selectJoin($projection, $table1, $table2, $on, $where = true): array
    {
        // dd("SELECT {$projection} FROM {$table1} INNER JOIN {$table2} {$on}");
        $this->stmt = self::$mysql->query("SELECT {$projection} FROM {$table1} INNER JOIN {$table2} ON {$on} WHERE {$where}");
        return $this->stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function selectJoins($projection, $table1, $where = true, array $tables_on): array
    {
        // dd("SELECT {$projection} FROM {$table1} INNER JOIN {$table2} {$on}");
        $query = "SELECT {$projection} FROM {$table1} ";

        foreach ($tables_on as $table => $on) {
            // dd([$table, $on]);

            $query .= "INNER JOIN {$table} ON {$on} ";
        }
        $query .= "WHERE {$where}";

        $this->stmt = self::$mysql->query("$query");

        return $this->stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function aggrgate($aggrfn, $table)
    {
        $this->stmt = self::$mysql->query("SELECT {$aggrfn}(*) FROM {$table}");
        return $this->stmt->fetch_row()[0];
    }

    /* ============================= Destruct ======================= */
    public function __destruct()
    {
        $done = self::$mysql->close();
        // echo $done ? "Connection is Closed" : "Closing Failed!";
    }
}

$database = Database::create($config['database']);