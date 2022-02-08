<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

// if user came from todos.php update order_todos (decrease 1)
if(isset($_GET['id_todos'])){
    $id_todos = $_GET['id_todos'];

    $select_orderUp_todos = $bdd->prepare('SELECT order_todos FROM todos WHERE id_todos = :id_todos');
    $select_orderUp_todos->bindParam(':id_todos', $id_todos);
    $select_orderUp_todos->execute();

    $get_orderUp_todos = $select_orderUp_todos->fetch();

    $increment_orderUp_todos = $get_orderUp_todos['order_todos'] - 1;

    if($get_orderUp_todos['order_todos'] > 1){
        $update_orderUp_todos = $bdd->prepare('UPDATE todos SET order_todos = :order_todos WHERE id_todos = :id_todos');
        $update_orderUp_todos->bindParam(':order_todos', $increment_orderUp_todos);
        $update_orderUp_todos->bindParam(':id_todos', $id_todos);
        $update_orderUp_todos->execute();   
    }
header('Location: ../../layouts/todos/todos.php');
exit();
}
// if user came from categories.php update order_categories (decrease 1)
else if(isset($_GET['order_categories'])){
    $order_categories = $_GET['order_categories'];

    $select_orderUp_categories = $bdd->prepare('SELECT order_categories FROM todos WHERE id_todos = :id_todos');
    $select_orderUp_categories->bindParam(':id_todos', $order_categories);
    $select_orderUp_categories->execute();

    $get_orderUp_categories = $select_orderUp_categories->fetch();

    $increment_orderUp_categories = $get_orderUp_categories['order_categories'] - 1;

    if($get_orderUp_categories['order_categories'] > 1){
        $update_orderUp_categories = $bdd->prepare('UPDATE todos SET order_categories = :order_categories WHERE id_todos = :id_todos');
        $update_orderUp_categories->bindParam(':order_categories', $increment_orderUp_categories);
        $update_orderUp_categories->bindParam(':id_todos', $order_categories);
        $update_orderUp_categories->execute();
        
    }
    header('Location: ../../layouts/categories.php');
}else{
    header('Location: ../../index.php');
}

?>