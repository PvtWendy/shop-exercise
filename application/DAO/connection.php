<?php

namespace application\DAO;

class connection
{
    private $db = "shop";
    private $host = "localhost";
    private $user = "root";
    private $password = "sucesso";


    private $conn;

    public function __construct($host, $user, $password, $conn)
    {
        $this->conn = new \mysqli($this->host, $this->user, $this->password, $this->db);
    }
    public function connect()
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
    public function disconnect()
    {
        $this->conn->close();
    }
}
