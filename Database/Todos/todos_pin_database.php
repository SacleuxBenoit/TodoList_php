<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

if(isset($_GET['id_todos'])){
    $id_todos = $_GET['id_todos'];
    
    $update_pin = $bdd->prepare('UPDATE create_todos SET order_todos = 0 WHERE id_todos = :id_todos');
    $update_pin->bindParam(':id_todos', $id_todos);
    $update_pin->execute();
    
    header('Location: ../../layouts/todos.php');
}else if(isset($_GET['order_categories'])){
    $order_categories = $_GET['order_categories'];
    
    $update_pin = $bdd->prepare('UPDATE create_todos SET order_categories = 0 WHERE id_todos = :id_todos');
    $update_pin->bindParam(':id_todos', $order_categories);
    $update_pin->execute();
    
    header('Location: ../../layouts/todos.php');
}

?>