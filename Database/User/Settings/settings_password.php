<?php
session_start();
include('../../../login_database.php');
include('../../connection_database.php');


if(!empty($_POST['settingsPassword'])){
    $pass_hash = password_hash($_POST['settingsPassword'], PASSWORD_DEFAULT);

    $update_password = $bdd->prepare('UPDATE user SET pass = :pass WHERE username = :username');
    $update_password->bindParam(':pass', $pass_hash);
    $update_password->bindParam(':username', $_SESSION['username']);
    $update_password->execute();
    header('Location: ../../../index.php');
}else{
    header('Location: ../../../layouts/settings.php');
}

?>