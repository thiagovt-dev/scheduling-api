<?php

class Database
{
    private $host = getenv('DATABASE_HOST');
    private $dialect = getenv('DATABASE_DIALECT');
    private $db_name = getenv('DATABASE_NAME');
    private $username = getenv('DATABASE_USERNAME');
    private $password = getenv('DATABASE_PASSWORD');
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("{$this->dialect}:host={$this->host};{$this->db_name}", $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error:" . $exception->getMessage();
        }
        return $this -> conn;

    }

}