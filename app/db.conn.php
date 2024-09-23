<?php
// Params connecting to the db
$host = '127.0.0.1:80';

$data = 'web_app';

$admin = 'root';

$pass = '';

$chr = 'utf8mb4';

$attr = "mysql: host=$host; dbname=$data; charset=$chr";

try {
    // Creating the PDO Object for connecting to the db
    $pdo = new PDO($attr, $admin, $pass);
} catch (PDOException $e){
    // Echo out the reason for failing to connect to the db
    throw new PDOException($e->getMessage() . $e->getCode());
}

// Set error mode 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);