<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

// Create new todos
if(!empty($_POST['addTask'])){
    $addTodos = $bdd->prepare('INSERT INTO todos(id_user,order_todos,order_categories,task,categories,createdAT) VALUES(:id_user, 1 , 1, :task, :categories, NOW())');
    $addTodos->bindParam(':id_user', $_SESSION['id_user']);
    $addTodos->bindParam(':task', $_POST['addTask'], PDO::PARAM_STR);
    $addTodos->bindParam(':categories', $_POST['categories'], PDO::PARAM_STR);
    $addTodos->execute();
}
header('Location: ../../layouts/todos/todos.php');
?>