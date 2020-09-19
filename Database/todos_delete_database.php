<?php
session_start();
include('../pass.php');

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TodoList;charset=utf8', 'root', $_SESSION['pass']);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$id = $_GET['id'];

$delete_todos = $bdd->prepare('DELETE FROM create_todos WHERE id= :id');
$delete_todos->bindParam(':id', $id);
$delete_todos->execute();

if($delete_todos){
    header('Location: ../home.php');
}else{
    echo "Error deleting todos";
}
?>