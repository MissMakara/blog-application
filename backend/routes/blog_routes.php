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
error_log("Received uri: ".$uri);
/* Get Method */
$method = $_SERVER['REQUEST_METHOD'];
error_log("Received method ".$method);

error_log("Begin routing");

// if ($uri ==='/favicon.ico'){
//     http_response_code(204);
//     exit;
// }


if ($method==='GET'){
    if ($uri==='/blogs'){
        error_log("Get all blogs");
    
        //call the fetch blogs function
        $controller->getAllBlogs();   
    }
    elseif(preg_match('/^\/blogs\/(\d+)/',$uri, $matches)){
        error_log('ROUTE: Blogs per id');
        foreach ($matches as $blog_id){
            error_log('Matches:'.$blog_id);
        }
            
        $controller->getSpecificBlog($blog_id);
    }
    elseif(preg_match('#^\/user/(\d+)\/blogs#', $uri, $matches)){
        error_log("ROUTE: Blogs per user id");
        $user_id =$matches[1];
        $controller->getUserBlogs($user_id);
    }

}
elseif($method==='POST'){
    if ($uri==='/blogs'){
        error_log ("ROUTE: Blog Creation");

        //receive the blog data
        $blog_data = json_decode(file_get_contents("php://input"), true);
      
        $controller->createBlog($blog_data);
    
    }

}
elseif($method==='PUT'){

}
elseif($method==='DELETE'){

}
