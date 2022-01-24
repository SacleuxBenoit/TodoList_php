<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

// if $_GET['id_todos] isn't empty : restore the todo by updating is_delete to 0
if(!empty($_GET['id_todos'])){
    $update_is_delete = $bdd->prepare('UPDATE todos SET is_delete = 0 WHERE id_todos = :id_todos');
    $update_is_delete->bindParam(':id_todos', $_GET['id_todos']);
    $update_is_delete->execute();
}
header('Location: ../../layouts/deleted_todos.php');
?>