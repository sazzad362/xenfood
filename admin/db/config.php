<?php
class Database {
    public $conn;
    //Store Database Info
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "xenfood";
    public function __construct() 
    {   
        // Define Mysqli Connection 
       $connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
       //Check connection
        if ($connection->connect_error) {
           echo "Error Database Connection";
        } 
        // return the mysqli instance
        $this->conn = $connection; 
    }
    public function connect()
    {   
        // return the mysqli connect
        return $this->conn;
    }
}