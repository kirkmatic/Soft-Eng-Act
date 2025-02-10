<?php

class db_connection
{
    public $conn;

    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("<h1>Database connection failed: </h1>");
        }
        $this->conn = $conn;
    }
    public function getConnection() {
        return $this->conn;
    }
}