<?php
echo "Hello WROLLLDS";
require __DIR__ .'/../core/database.php';
$db_instance = new DbConnect();
$pdo_connection = $db_instance -> getConn();

echo "DB Connection successful";
