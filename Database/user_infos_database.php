<?php
session_start();
include('../pass.php');

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TodoList;charset=utf8', 'root', $_SESSION['pass']);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

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
