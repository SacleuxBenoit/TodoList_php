<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$delete_categories = $bdd->prepare('UPDATE create_todos SET categories = "none" WHERE categories = :categories');
$delete_categories->bindParam(':categories', $_GET['categories']);
$delete_categories->execute();
header('Location: ../../layouts/todos.php');
?>