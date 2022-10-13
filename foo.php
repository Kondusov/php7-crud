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

//Read user
$sql = $pdo->prepare("SELECT * FROM  users_1");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//Edit user
if(isset($_POST['edit'])){
    $sql = ("UPDATE `users_1` SET `name`=?,`email`=? WHERE ID=?");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email, $get_id]);
    if($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//Delete user
if(isset($_POST['delete'])){
    $sql = ("DELETE FROM `users_1` WHERE ID=?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}