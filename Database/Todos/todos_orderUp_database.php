<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');


if(isset($_GET['id_todos'])){
    $id_todos = $_GET['id_todos'];

    $select_orderUp_todos = $bdd->prepare('SELECT order_todos FROM create_todos WHERE id_todos = :id_todos');
    $select_orderUp_todos->bindParam(':id_todos', $id);
    $select_orderUp_todos->execute();

    $get_orderUp_todos = $select_orderUp_todos->fetch();

    $increment_orderUp_todos = $get_orderUp_todos['order_todos'] - 1;

    if($get_orderUp_todos['order_todos'] > 1){
        $update_orderUp_todos = $bdd->prepare('UPDATE create_todos SET order_todos = :order_todos WHERE id_todos = :id_todos');
        $update_orderUp_todos->bindParam(':order_todos', $increment_orderUp_todos);
        $update_orderUp_todos->bindParam(':id_todos', $id);
        $update_orderUp_todos->execute();
        
    }

header('Location: ../../layouts/todos.php');

}else if(isset($_GET['order_categories'])){
    $order_categories = $_GET['order_categories'];

    $select_orderUp_categories = $bdd->prepare('SELECT order_categories FROM create_todos WHERE id_todos = :id_todos');
    $select_orderUp_categories->bindParam(':id_todos', $order_categories);
    $select_orderUp_categories->execute();

    $get_orderUp_categories = $select_orderUp_categories->fetch();

    $increment_orderUp_categories = $get_orderUp_categories['order_categories'] - 1;

    if($get_orderUp_categories['order_categories'] > 1){
        $update_orderUp_categories = $bdd->prepare('UPDATE create_todos SET order_categories = :order_categories WHERE id_todos = :id_todos');
        $update_orderUp_categories->bindParam(':order_categories', $increment_orderUp_categories);
        $update_orderUp_categories->bindParam(':id_todos', $order_categories);
        $update_orderUp_categories->execute();
        
    }

header('Location: ../../layouts/todos.php');
}

?>