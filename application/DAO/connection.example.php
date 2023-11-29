<?php 
namespace application\DAO;

 class Connection {
    private $db_name ="shop";
    private $db_user = "root";
    private $db_pass = "123";
    private $db_host = "localhost";

    
    private $conn;

    public function __construct() {
        $this->conn = new \mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, 3306);
    }

    public function connect () {
        
        if($this->conn->connect_error) {
            die("a conexão falhou. ". $this->conn->connect_error);
        }
        return $this->conn;
    }
    
    public function disconnect(){
        $this->conn->close();
    }
 } 


 ?>