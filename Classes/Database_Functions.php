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
    function find_column($key = null, $value = null)
    {
        $query = 'SELECT `' . $key . '` FROM `' . $this->table . '` ';
        if ($key != null && $value != null) {
            $query .= 'WHERE `' . $key . '` = \'' . $value . '\'';
        }
        $result = $this->query($query);
        return $result->fetchAll();
    }
    /**
     * Fetches a single user record into an array
     * from the database 
     */
    function find_single_record($key, $value)
    {
        $query = "SELECT * FROM `users` WHERE `$key` = '$value'";
        $result = $this->query($query);
        return $result->fetch();
    }
}
