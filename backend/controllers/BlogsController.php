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

    /*Function to fetch a specific blog using blog id*/
    public function getSpecificBlog($blog_id){
        error_log("Getting the blog with id: ".$blog_id);
        
        $blog = $this->blogsModel->fetchSpecificBlog($blog_id);
        error_log("Received the blog: ");
        foreach ($blog as $entry){
            foreach ($entry as $index=>$elem){
                echo($index.":".$elem);
                echo("<br>");
            }
        }

        return $blog;
        

    }

    public function getUserBlogs($user_id){
        error_log("Getting blogs for user ".$user_id);
        $user_blogs = $this->blogsModel->fetchUserBlogs($user_id);

        error_log("Received user blogs");
        echo("DISPLAYING BLOGS BY USER ".$user_id."<br>");
        foreach($user_blogs as $user_blog){
            foreach($user_blog as $index=>$blog_item){
                echo ($index.":".$blog_item);
                echo("<br>");
            }
        }

    }

    public function createBlog($blog_data){
        error_log("Sending data to Model for Blog creation");
        echo (print_r($blog_data,true));
        $this->blogsModel->addBlog($blog_data);
        
    }

    public function updateBlog($blog_id){

    }

}