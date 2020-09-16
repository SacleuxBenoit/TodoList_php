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

$user_info = $bdd->prepare('INSERT INTO user(email,pass) VALUES(:email, :pass)');
$user_info->bindParam(':email', $_POST['RegisterEmail']);
$user_info->bindParam(':pass', $_POST['RegisterPass']);
$user_info->execute();
?>