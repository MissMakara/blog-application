<?php
error_log("In Blogs Controller");
require_once __DIR__.'/../models/BlogsModel.php';

class BlogsController{
    public $blogs;
    // public $blogsModel;
    

    function __construct($blogsModel){
        error_log("Controller constructor");
        $this->blogsModel= $blogsModel;

    }

    public function getAllBlogs(){
        error_log("Fetching the blogs");

        $blogs = $this->blogsModel->fetchAllBlogs();
        // header('Content-Type: application/json');
        error_log("Received Blogs: ");
        foreach($blogs as $blog){
            foreach ($blog as $index=>$entry){
                echo json_encode($index.":".$entry);
                echo "<br>";
            };
            
        }

        return $blogs;
        
    }

    public function getSpecificBlog(){

    }
}