<?php
$host = 'localhost';
$db = 'php7-crud';
$user = 'root';
$pass = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
}
catch(PDOException $e){
    echo 'DB connect Error'. $e->getMessage();
}