<?php
session_start();
include('connection_database.php');

if(empty($_POST['addTask'])){
    header('Location: ../home.php');
}else{
    $addTodos = $bdd->prepare('INSERT INTO create_todos(task,createdAT) VALUES(:task,NOW())');
    $addTodos->bindParam(':task', $_POST['addTask']);
    $addTodos->execute();
    header('Location: ../home.php');
}

?>