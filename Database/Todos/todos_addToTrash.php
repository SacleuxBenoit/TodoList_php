<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

// if is_delete = 1 : todo won't appear in todos.php || categories.php but that'll appear on deleted_tasks.php
if(isset($_GET['id_todos'])){
    $update_is_delete = $bdd->prepare('UPDATE todos SET is_delete = 1 WHERE id_todos =:id_todos');
    $update_is_delete->bindParam(':id_todos', $_GET['id_todos']);
    $update_is_delete->execute();
}
header('Location: ../../layouts/todos/todos.php');
?>