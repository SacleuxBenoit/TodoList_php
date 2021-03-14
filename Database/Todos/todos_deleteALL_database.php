<?php
session_start();
include('../connection_database.php');
include('../../pass.php');

$deleteALL_todos = $bdd->prepare('DELETE FROM create_todos WHERE id_user = :id_user');
$deleteALL_todos->bindParam(':id_user', $_SESSION['id_user']);
$deleteALL_todos->execute();

if($deleteALL_todos){
    header('Location: ../../layouts/todos.php');
}else{
    echo "Error deleting todos";
}
?>