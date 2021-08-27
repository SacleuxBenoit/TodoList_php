<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$update_is_delete = $bdd->prepare('UPDATE create_todos SET is_delete = 1 WHERE id_todos =:id_todos');
$update_is_delete->bindParam(':id_todos', $_GET['id_todos']);
$update_is_delete->execute();
header('Location: ../../layouts/todos.php');
?>