<?php
error_log("In Blogs Routes");
require_once __DIR__."/../controllers/BlogsController.php";
require_once __DIR__ .'/../models/BlogsModel.php';

/*Pass the PDO db connection from index.php */
error_log("Creating Blog Model instance");
$blogsmodel = new BlogsModel($pdo_connection);

error_log("Creating Blog Controller instance");
$controller = new BlogsController($blogsmodel);

/**Get URI details */
$uri = $_SERVER['REQUEST_URI'];
error_log("Received uri".$uri);
/* Get Method */
$method = $_SERVER['REQUEST_METHOD'];
error_log("Received method".$method);

error_log("Begin routing");

if ($uri==='/blogs' && $method==='GET'){
    error_log("Get all blogs");

    //call the fetch blogs function
    $controller->getAllBlogs();   

} 
elseif ($uri==='/blogs' && $method ==='POST'){
    error_log ("In post method");

}