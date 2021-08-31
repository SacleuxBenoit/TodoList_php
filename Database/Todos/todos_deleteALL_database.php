<?php
session_start();
include('../connection_database.php');
include('../../login_database.php');

// Delete every todos
if($_SESSION['id_user']){
    $deleteALL_todos = $bdd->prepare('DELETE FROM todos WHERE id_user = :id_user');
    $deleteALL_todos->bindParam(':id_user', $_SESSION['id_user']);
    $deleteALL_todos->execute();
}
header('Location: ../../layouts/todos.php');
?>