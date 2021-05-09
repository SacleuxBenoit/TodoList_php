<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$update_password = $bdd->prepare('UPDATE user SET pass = :pass WHERE username = :username');
$update_password->bindParam(':pass', $_POST['settingsPassword']);
$update_password->bindParam(':username', $_SESSION['username']);
$update_password->execute();

?>