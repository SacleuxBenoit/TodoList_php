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

$user_login = $bdd->prepare('SELECT email,pass FROM user WHERE email = :email');
$user_login->bindParam(':email', $_POST['LoginEmail']);
$user_login->execute();
$donnees = $user_login->fetch();

if($_POST['LoginEmail'] == $donnees['email'] && password_verify($_POST['LoginPass'],$donnees['pass'])){
    header('Location: ./../home.php');
}else{
    header('Location: ./../login.php');
}
?>