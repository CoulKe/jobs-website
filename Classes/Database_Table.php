<?php
class Database_Table
{
    private $table;

    public function __construct(\PDO $pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }
    private function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }
    public function selectLike($column, $value)
    {
        $query = 'SELECT * FROM `' . $this->table . '` WHERE `' . $column . '` LIKE :value';
        $parameters = ['value' => "%$value%"];
        $result = $this->query($query, $parameters);
        return $result->fetchAll();
    }
    public function insert($fields)
    {

        $stmt = 'INSERT INTO ' . $this->table .
            ' SET ';
        foreach ($fields as $key => $value) {
            $stmt .= '`' . $key . '`=:' . $key . ',';
        }
        $query = rtrim($stmt, ',');
        $this->query($query, $fields);
    }
    public function findAll($key = null, $value = null)
    {
        $parameters = [];
        $query = 'SELECT * FROM `' . $this->table . '` ';
        if ($key != null && $value != null) {
            $query .= 'WHERE `' . $key . '` = :key';
            $parameters = ['key' => $value];
        }
        $result = $this->query($query, $parameters);
        return $result->fetchAll();
    }
    public function findById($value)
    {
        $query = 'SELECT * FROM `' . $this->table . '` WHERE `id` = :value';
        $parameters = ['value' => $value];
        $query = $this->query($query, $parameters);
        return $query->fetch();
    }
    /**
     * Fetches a single user record into an array
     * from the database 
     */
    public function find_single_record($key, $value)
    {
        $query = "SELECT * FROM `" . $this->table . "` WHERE `$key` = :value";
        $parameters = ['value' => $value];
        $result = $this->query($query, $parameters);
        return $result->fetch();
    }
    /**
     * Fetches result from the database using SQL Limit.
     * If column and value are not specified it fetches
     * all data.
     */
    public function limit_query(int $start, int $end, string $column = null, string $value = null)
    {
        $parameters = [];
        $query = 'SELECT * FROM `' . $this->table . '`';
        if ($column !== null && $value !== null) {
            $query .= ' WHERE `' . $column . '` = :column';
            $parameters = ['column' => $value];
        }
        $query .= ' LIMIT ' . $start . ',' . $end;
        $result = $this->query($query, $parameters);
        return $result;
    }
    public function update($fields = [])
    {
        $query = "UPDATE `$this->table` SET ";
        foreach ($fields as $key => $value) {
            $query .= "`$key` = :$key,";
        }

        $query = rtrim($query, ',');
        $query .= " WHERE id = :id";
        $result = $this->query($query, $fields);
    }
}
