<?php
error_log("In Db Connect");

class DbConnect{

    public $db_host;
    public $db_name;
    public $db_pass;
    public $db_user;
    public $connection;
    private $pdo;

    function __construct(){
        try{
            $db_configs = require_once __DIR__."/../config/config.php";

            $this->db_host = $db_configs['DB_HOST'];
            $this->db_name = $db_configs['DB_NAME'];
            $this->db_user = $db_configs['DB_USER'];
            $this->db_pass = $db_configs['DB_PASS'];

        }
        catch(Exception $e){
            error_log("ERROR:Experienced an error when fetching configs: ".$e->getMessage());
            die();
        }
       
    }

    
    public function getConn(){
       error_log("Creating a connection");
        try{
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            
            return $this->connection;
        }
        catch(PDOException $e){
            error_log("ERROR: Experience an error when connecting to the database: ".$e->getMessage());
            die();

        }


    }

   
    
}