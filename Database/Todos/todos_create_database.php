<?php
session_start();
include('../connection_database.php');

if(empty($_POST['addTask']) || empty($_POST['deadLine'])){
    header('Location: ../../layouts/todos.php');
}else{
    $addTodos = $bdd->prepare('INSERT INTO create_todos(id_user,task,deadLine,createdAT) VALUES(:id_user,:task,:deadLine,NOW())');
    $addTodos->bindParam(':id_user', $_SESSION['id_user']);
    $addTodos->bindParam(':task', $_POST['addTask'], PDO::PARAM_STR);
    $addTodos->bindParam(':deadLine', $_POST['deadLine'], PDO::PARAM_STR);
    $addTodos->execute();
    header('Location: ../../layouts/todos.php');
}

?>