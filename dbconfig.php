<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mysql');
define('DB_NAME', 'CRUD_project');
define('DB_CHARSET', 'utf8mb4');

$dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

try {
    $pdo = new PDO($dns, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";

}catch (Exception $e){
    echo "connection failed: " . $e->getMessage();
}

