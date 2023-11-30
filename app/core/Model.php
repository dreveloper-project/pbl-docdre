<?php

class Model
{
    private $host;
    private $db;
    private $user;
    private $pass;
    
    public function __construct( ) {

        require_once __DIR__ . '/../../vendor/autoload.php';

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
      
        $this->host = $_ENV['DB_HOST'];

        $this->db = $_ENV['DB_DATABASE'];

        $this->user = $_ENV['DB_USERNAME'];
        $this->pass =  $_ENV['DB_PASSWORD'];

     
    }


    public function connect()
    {

       
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $conn = new PDO($dsn, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            return $conn;
        } catch (PDOException $e) {
            return $e->getMessage();
            
        }
    }
}