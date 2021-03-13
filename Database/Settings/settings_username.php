<?php
session_start();
include('../../pass.php');
include('../connection_database.php');

    $send = $bdd->prepare('UPDATE user SET username = :newUsername WHERE username = :username');
    $send->bindParam(':newUsername', $_POST['settingsUsername']);
    $send->bindParam(':username', $_SESSION['usernameRegister']);
    $send->execute();
?>