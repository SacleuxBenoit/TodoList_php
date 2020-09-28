<?php
session_start();
include('connection_database.php');

if(empty($_POST['addTitle']) || empty($_POST['addTask'])){
    header('Location: ../home.php');
}else{
    $addTodos = $bdd->prepare('INSERT INTO create_todos(title,task) VALUES(:title, :task)');
    $addTodos->bindParam(':title', $_POST['addTitle']);
    $addTodos->bindParam(':task', $_POST['addTask']);
    $addTodos->execute();
    header('Location: ../home.php');
}

?>