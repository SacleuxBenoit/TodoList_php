<?php
session_start();
include('../connection_database.php');

$deleteALL_todos = $bdd->query('DELETE FROM create_todos');

if($deleteALL_todos){
    header('Location: ../../layouts/todos.php');
}else{
    echo "Error deleting todos";
}
?>