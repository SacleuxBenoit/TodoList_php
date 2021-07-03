<?php
session_start();
include('../../../login_database.php');
include('../../connection_database.php');

if(!empty($_POST['settingsUsername'])){
    $send = $bdd->prepare('UPDATE user SET username = :newUsername WHERE username = :username');
    $send->bindParam(':newUsername', $_POST['settingsUsername']);
    $send->bindParam(':username', $_SESSION['usernameRegister']);
    $send->execute();
    header('Location: ../../../layouts/todos.php');
}else{
    header('Location: ../../../index.php');

}

?>