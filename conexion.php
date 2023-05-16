<?php

class Conexion
{

    private $conn;

    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'prueba_ajax';

        try {
            $dsn = "mysql:host=$host;dbname=$database";
            $this->conn = new PDO($dsn, $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }

}
