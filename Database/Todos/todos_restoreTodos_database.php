<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(!empty($_GET['id_todos'])){
    $update_is_delete = $bdd->prepare('UPDATE create_todos SET is_delete = 0 WHERE id_todos = :id_todos');
    $update_is_delete->bindParam(':id_todos', $_GET['id_todos']);
    $update_is_delete->execute();
}

header('Location: ../../layouts/deleted_tasks.php');
?>