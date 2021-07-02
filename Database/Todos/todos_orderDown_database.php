<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

if(isset($_GET['id_todos'])){
    $id_todos = $_GET['id_todos'];

    $select_orderDown_todos = $bdd->prepare('SELECT order_todos FROM create_todos WHERE id_todos = :id_todos');
    $select_orderDown_todos->bindParam(':id_todos', $id_todos);
    $select_orderDown_todos->execute();
    
    $get_orderDown_todos = $select_orderDown_todos->fetch();
    
    $increment_orderDown_todos = $get_orderDown_todos['order_todos'] + 1;
    
    $update_orderDown_todos = $bdd->prepare('UPDATE create_todos SET order_todos = :order_todos WHERE id_todos = :id_todos');
    $update_orderDown_todos->bindParam(':order_todos', $increment_orderDown_todos);
    $update_orderDown_todos->bindParam(':id_todos', $id_todos);
    $update_orderDown_todos->execute();
    
    header('Location: ../../layouts/todos.php');
}else if(isset($_GET['order_categories'])){
    $order_categories = $_GET['order_categories'];

    $select_orderDown_todos = $bdd->prepare('SELECT order_categories FROM create_todos WHERE id_todos = :order_categories');
    $select_orderDown_todos->bindParam(':order_categories', $order_categories);
    $select_orderDown_todos->execute();
    
    $get_orderDown_todos = $select_orderDown_todos->fetch();
    
    $increment_orderDown_todos = $get_orderDown_todos['order_categories'] + 1;
    
    $update_orderDown_todos = $bdd->prepare('UPDATE create_todos SET order_categories = :order_todos WHERE id_todos = :order_categories');
    $update_orderDown_todos->bindParam(':order_todos', $increment_orderDown_todos);
    $update_orderDown_todos->bindParam(':order_categories', $order_categories);
    $update_orderDown_todos->execute();
    
    header('Location: ../../layouts/todos.php');
}else{
    header('Location: ../../index.php');
}

?>