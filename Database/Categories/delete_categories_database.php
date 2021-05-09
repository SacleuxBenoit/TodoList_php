<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$update_categories = $bdd->prepare('UPDATE create_todos SET categories = "none" WHERE categories = :categories');
$update_categories->bindParam(':categories', $_GET['categories']);
$update_categories->execute();

$delete_categories = $bdd->prepare('DELETE FROM categories WHERE categories = :categories');
$delete_categories->bindParam(':categories', $_GET['categories']);
$delete_categories->execute();

header('Location: ../../layouts/todos.php');
?>