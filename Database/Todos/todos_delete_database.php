<?php
session_start();
include('../connection_database.php');

$id = $_GET['id'];

$delete_todos = $bdd->prepare('DELETE FROM create_todos WHERE id= :id');
$delete_todos->bindParam(':id', $id);
$delete_todos->execute();

if($delete_todos){
    header('Location: ../../layouts/todos.php');
}else{
    echo "Error deleting todos";
}
?>