<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$get_id = $_GET['id'];

//var_dump($_REQUEST);
    //die();
    
//Create user
if(isset($_POST['add'])){
    
    //$sql = ("INSERT INTO users_1 (name, email) VALUES (?,?)");
    $sql = ("INSERT INTO `users_1`(`name`, `email`) VALUES (?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email]);
    if($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}
//Read
$sql = $pdo->prepare("SELECT * FROM  users_1");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);