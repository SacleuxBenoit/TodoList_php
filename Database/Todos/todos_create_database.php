<?php
session_start();
include('../connection_database.php');

if(empty($_POST['addTask']) || empty($_POST['deadLine'])){
    header('Location: ../../layouts/home.php');
}else{
    $addTodos = $bdd->prepare('INSERT INTO create_todos(task,deadLine,createdAT) VALUES(:task,:deadLine,NOW())');
    $addTodos->bindParam(':task', $_POST['addTask'], PDO::PARAM_STR);
    $addTodos->bindParam(':deadLine', $_POST['deadLine'], PDO::PARAM_STR);
    $addTodos->execute();
    header('Location: ../../layouts/home.php');
}

?>