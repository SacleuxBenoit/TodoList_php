<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

$id = $_GET['id_todos'];

$select_orderUp_todos = $bdd->prepare('SELECT order_todos FROM create_todos WHERE id_todos = :id_todos');
$select_orderUp_todos->bindParam(':id_todos', $id);
$select_orderUp_todos->execute();

$get_orderUp_todos = $select_orderUp_todos->fetch();

$increment_orderUp_todos = $get_orderUp_todos['order_todos'] - 1;

if($get_orderUp_todos['order_todos'] > 0){
    $update_orderUp_todos = $bdd->prepare('UPDATE create_todos SET order_todos = :order_todos WHERE id_todos = :id_todos');
    $update_orderUp_todos->bindParam(':order_todos', $increment_orderUp_todos);
    $update_orderUp_todos->bindParam(':id_todos', $id);
    $update_orderUp_todos->execute();
    
}

header('Location: ../../layouts/todos.php');
?>