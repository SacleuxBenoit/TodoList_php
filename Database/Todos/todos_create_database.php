<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

if(empty($_POST['addTask'])){
    header('Location: ../../layouts/todos.php');
}else{
    $addTodos = $bdd->prepare('INSERT INTO create_todos(id_user,order_todos,task,createdAT) VALUES(:id_user, 1 , :task, NOW())');
    $addTodos->bindParam(':id_user', $_SESSION['id_user']);
    $addTodos->bindParam(':task', $_POST['addTask'], PDO::PARAM_STR);
    $addTodos->execute();
    header('Location: ../../layouts/todos.php');
}

?>