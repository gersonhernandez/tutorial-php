<?php

class Database
{
    private $host = 'localhost';
    private $username = 'gerson';
    private $password = '240208';
    private $database = 'tutorial-php';
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
