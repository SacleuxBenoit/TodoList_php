<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

$id_todos = $_GET['id_todos'];

echo $id_todos;

$update_pin = $bdd->prepare('UPDATE create_todos SET order_todos = 0 WHERE id_todos = :id_todos');
$update_pin->bindParam(':id_todos', $id_todos);
$update_pin->execute();

header('Location: ../../layouts/todos.php');
?>