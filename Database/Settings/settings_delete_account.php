<?php
session_start();
include('../../pass.php');
include('../connection_database.php');

$delete_account = $bdd->prepare('DELETE FROM user WHERE username = :username');
$delete_account->bindParam(':username', $_SESSION['usernameRegister']);
$delete_account->execute();
header('Location: ../../index.php');
?>