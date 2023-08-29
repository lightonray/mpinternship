<?php


class Database 
{
    private $host; 
    private $username; 
    private $password; 
    private $db; 
    private $connection;

    public function __construct($host = "localhost:7000", $username = "root", $password = "", $db = "megaparts2")
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db; 
        

        $this->connect($host,$username,$password,$db);
    }

    private function connect($host,$username,$password,$db)
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql, $params = []) {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return [];
        }
    }


    public function execute($sql, $params = []) {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            return $statement->rowCount();
        } catch (PDOException $e) {
            echo "Execution failed: " . $e->getMessage();
            return 0;
        }
    }



    public function create($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($data);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            echo "Create failed: " . $e->getMessage();
            return false;
        }
    }



    public function read($table, $condition = '', $params = [])
        {
            $sql = "SELECT * FROM $table";
            if (!empty($condition)) {
                $sql .= " WHERE $condition";
            }

            return $this->query($sql, $params);
        }

    public function update($table, $data, $condition, $params = [])
    {
        $setClause = implode('=?, ', array_keys($data)) . '=?';

        $sql = "UPDATE $table SET $setClause WHERE $condition";
        $updateParams = array_merge(array_values($data), $params);

        $this->query($sql, $updateParams);
    }


    public function delete($table, $condition, $params = [])
    {
        $sql = "DELETE FROM $table WHERE $condition";

        $this->query($sql, $params);
    }
}


