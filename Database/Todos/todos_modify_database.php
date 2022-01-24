<?php
session_start();   
include('../connection_database.php');
include('../../login_database.php');
    
// user can modify their todos
if(isset($_GET['id_todos'])){
    $modify_todos = $bdd->prepare('UPDATE todos SET task = :task, categories = :categories, updatedAT = NOW() WHERE id_todos = :id');
    $modify_todos->bindParam(':task', $_POST['modifyTask'], PDO::PARAM_STR);
    $modify_todos->bindParam(':categories', $_POST['categories'], PDO::PARAM_STR);
    $modify_todos->bindParam(':id', $_GET['id_todos']);
    $modify_todos->execute();
}
header('Location: ../../layouts/todos/todos.php');
?>