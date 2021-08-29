<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

// if user came from todos.php update order_todos (increase 1)
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
    exit();
}
// else if user came from categories.php update order_categories (increase 1)
else if(isset($_GET['order_categories'])){
    $order_categories = $_GET['order_categories'];

    $select_orderDown_categories = $bdd->prepare('SELECT order_categories FROM create_todos WHERE id_todos = :id_todos');
    $select_orderDown_categories->bindParam(':id_todos', $order_categories);
    $select_orderDown_categories->execute();
    
    $get_orderDown_todos = $select_orderDown_categories->fetch();
    
    $increment_orderDown_todos = $get_orderDown_todos['order_categories'] + 1;
    
    $update_orderDown_categories = $bdd->prepare('UPDATE create_todos SET order_categories = :order_todos WHERE id_todos = :id_todos');
    $update_orderDown_categories->bindParam(':order_todos', $increment_orderDown_todos);
    $update_orderDown_categories->bindParam(':id_todos', $order_categories);
    $update_orderDown_categories->execute();
    
    header('Location: ../../layouts/categories.php');
    exit();
}else{
    header('Location: ../../index.php');
}

?>