<?php
session_start();
include('connection_database.php');

if(empty($_POST['RegisterEmail']) || empty($_POST['RegisterPass'])){
    header('Location: ../register.php');
}else{
    $pass_hash = password_hash($_POST['RegisterPass'], PASSWORD_DEFAULT);
    $user_info = $bdd->prepare('INSERT INTO user(email,pass) VALUES(:email, :pass)');
    $user_info->bindParam(':email', $_POST['RegisterEmail']);
    $user_info->bindParam(':pass', $pass_hash);
    $user_info->execute();
}

?>
