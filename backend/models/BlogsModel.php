<?php
error_log("In Blog Models");
require_once __DIR__ .'/../core/database.php';

class BlogsModel{
    private $pdo;

    public function __construct($pdo){
        $this->pdo =$pdo;

    }

    //fetch all blogs
    public function fetchAllBlogs(){
        error_log("Fetching all blogs");
        try{
            $stmt = $this->pdo->query("SELECT * FROM blogs");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch( Exception $e){
            error_log("Error: ".$e->getMessage());
        }
        

        
    }
    
    //fetch a specific blog
    public function fetchSpecificBlog($blog_id){
        error_log("Fetching blog id:".print_r($blog_id, true));

        try{
            $stmt=$this->pdo->prepare("SELECT * FROM blogs WHERE blog_id= ?");
            $stmt->execute([$blog_id]);
            $result = $stmt->fetchall(PDO::FETCH_ASSOC);
            return $result;

        }
        catch(Exception $e){
            error_log("Experienced an error: ".$e->getMessage());

        }


    }

    //fetch blogs belonging to a given user
    public function fetchUserBlogs($user_id){
        error_log("Fetching user ".$user_id." blogs");

        $stmt= $this->pdo->PREPARE("SELECT * FROM blogs WHERE user_id=?");
        $stmt->EXECUTE([$user_id]);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;

    }
    
    //update blog
    public function updateBlog($blog_id){

    }
    
    //delete blog
    public function deleteBlog($blog_id){

    }
    
    //add blog
    public function addBlog($blog_data){
        error_log("Received data for blog creation.");
        echo (print_r($blog_data,true));

    }
}

