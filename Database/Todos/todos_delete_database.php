<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

// delete 1 todo
if(isset($_GET['id_todos'])){
    $delete_todos = $bdd->prepare('DELETE FROM todos WHERE id_todos = :id');
    $delete_todos->bindParam(':id', $_GET['id_todos']);
    $delete_todos->execute();
}
header('Location: ../../layouts/todos/deleted_todos.php');

?>