<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

$id = $_GET['id_todos'];

$select_order_todos = $bdd->prepare('SELECT order_todos FROM create_todos WHERE id_todos = :id_todos');
$select_order_todos->bindParam(':id_todos', $id);
$select_order_todos->execute();

$get_order_todos = $select_order_todos->fetch();

$increment_order_todos = $get_order_todos['order_todos'] + 1;

$update_order_todos = $bdd->prepare('UPDATE create_todos SET order_todos = :order_todos WHERE id_todos = :id_todos');
$update_order_todos->bindParam(':order_todos', $increment_order_todos);
$update_order_todos->bindParam(':id_todos', $id);
$update_order_todos->execute();
?>