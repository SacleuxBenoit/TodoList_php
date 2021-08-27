<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

if(isset($_GET['id_todos'])){
    $delete_todos = $bdd->prepare('DELETE FROM create_todos WHERE id_todos = :id');
    $delete_todos->bindParam(':id', $_GET['id_todos']);
    $delete_todos->execute();
    
    header('Location: ../../layouts/deleted_tasks.php');
}else if($_GET['id_todos_from_categories']){
    $delete_todos = $bdd->prepare('DELETE FROM create_todos WHERE id_todos = :id');
    $delete_todos->bindParam(':id', $_GET['id_todos_from_categories']);
    $delete_todos->execute();

    header('Location: ../../layouts/categories.php');
}
?>