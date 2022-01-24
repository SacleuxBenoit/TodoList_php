<?php
session_start();
include('../../../login_database.php');
include('../../connection_database.php');

/* ---------------- FIND THE PASSWORD IN DATABASE ---------------- */ 
$get_pass = $bdd->prepare('SELECT pass FROM user WHERE username =:username');
$get_pass->bindParam(':username', $_SESSION['username']);
$get_pass->execute();

$fetch_get_pass = $get_pass->fetch();

/* ---------------- VERIFY IF NEW PASSWORD MATCH + IF INPUT AREN'T EMPTY ---------------- */ 

if(password_verify($_POST['verifyPassword'],$fetch_get_pass['pass']) && !empty($_POST['settingsUsername']) && !empty($_POST['verifyPassword'])){
    $send = $bdd->prepare('UPDATE user SET username = :newUsername WHERE username = :username');
    $send->bindParam(':newUsername', $_POST['settingsUsername']);
    $send->bindParam(':username', $_SESSION['username']);
    $send->execute();
    header('Location: ../../../layouts/todos/todos.php');
}else{
    header('Location: ../../../layouts/settings.php');
}
?>