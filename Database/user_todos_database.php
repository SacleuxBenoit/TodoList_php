<?php
session_start();
include('../pass.php');

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TodoList;charset=utf8', 'root', $_SESSION['pass']);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$addTodos = $bdd->prepare('INSERT INTO create_todos(title,task) VALUES(:title, :task)');
$addTodos->bindParam(':title', $_POST['addTitle']);
$addTodos->bindParam(':task', $_POST['addTask']);
$addTodos->execute();
?>