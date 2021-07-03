<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$select_user_id = $bdd->prepare('SELECT id from user WHERE username = :username');
$select_user_id->bindParam(':username', $_SESSION['username']);
$select_user_id->execute();

$get_user_id = $select_user_id->fetch();

echo $get_user_id['id'];

// Delete account 

$delete_account = $bdd->prepare('DELETE FROM user WHERE id = :id');
$delete_account->bindParam(':id', $get_user_id['id']);
$delete_account->execute();

// Delete todos

$delete_todos = $bdd->prepare('DELETE FROM create_todos WHERE id_user = :id');
$delete_todos->bindParam(':id', $get_user_id['id']);
$delete_todos->execute();

header('Location: ../../index.php');
?>