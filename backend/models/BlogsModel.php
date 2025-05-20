<?php
require_once __DIR__ .'/../core/database.php';

class BlogsModel{
    private $pdo;

    public function __construct($pdo){
        $this->pdo =$pdo;

    }

    //fetch all blogs
    public function fetchAllBlogs(){
        error_log("Running the sql query");
        try{
            $stmt = $this->pdo->query("SELECT * FROM blogs");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch( Exception $e){
            error_log("Error: ".$e->getMessage());
        }
        

        
    }
    
    //fetch a specific blog
    public function fetchSpecificBlog($blog_id){

    }

    //fetch blogs belonging to a given user
    public function fetchUserBlogs($user_id){

    }
    
    //update blog
    public function updateBlog($blog_id){

    }
    
    //delete blog
    public function deleteBlog($blog_id){

    }
    
    //add blog
    public function addBlog($blog){

    }
}

