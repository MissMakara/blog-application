<?php
error_log("In index file");
require __DIR__ .'/../core/database.php';



//New db connection
$db_instance = new DbConnect();
$pdo_connection = $db_instance->getConn();

error_log("DB Connection successful");


require_once __DIR__ .'/../routes/blog_routes.php';


//Query
