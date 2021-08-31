<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

// if $_GET['id_todos'] exist : pin the todo by updating order_todos to 0 in todos.php
if(isset($_GET['id_todos'])){    
    $update_pin = $bdd->prepare('UPDATE todos SET order_todos = 0 WHERE id_todos = :id_todos');
    $update_pin->bindParam(':id_todos', $_GET['id_todos']);
    $update_pin->execute();

    header('Location: ../../layouts/todos.php');
    exit();
}
// if $_GET['order_categories'] exist : pin the todo by updating order_categories to 0 in categories.php
else if(isset($_GET['order_categories'])){
    $update_pin = $bdd->prepare('UPDATE todos SET order_categories = 0 WHERE id_todos = :id_todos');
    $update_pin->bindParam(':id_todos', $_GET['order_categories']);
    $update_pin->execute();

    header('Location: ../../layouts/categories.php');
    exit();
}
?>