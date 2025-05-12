<?php



class DbConnect{

    public $db_host;
    public $db_name;
    public $db_pass;
    public $db_user;
    public $connection;
    private $pdo;

    function __construct(){
    
        $db_configs = require_once __DIR__."/../config/config.php";

        $this->db_host = $db_configs['DB_HOST'];
        $this->db_name = $db_configs['DB_NAME'];
        $this->db_user = $db_configs['DB_USER'];
        $this->db_pass = $db_configs['DB_PASS'];
    }

    
    public function getConn(){
        print_r($db_host);
   
        try{
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            
            return $this->connection;
        }
        catch(PDOException $e){
            echo "Experience an error when connecting to the database: ".$e->getMessage();
            die();

        }


    }

   
    
}