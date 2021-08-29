<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

// verify the state of is_check
$verify_is_check = $bdd->prepare('SELECT is_check FROM create_todos WHERE id_todos = :id_todos');
$verify_is_check->bindParam(':id_todos', $_GET['id_todos']);
$verify_is_check->execute();
$fetch_is_check = $verify_is_check->fetch();

// if is_check is true, switch to false
if($fetch_is_check['is_check']){
    $update_is_check = $bdd->prepare('UPDATE create_todos SET is_check = 0 WHERE id_todos = :id_todos');
    $update_is_check->bindParam(':id_todos', $_GET['id_todos']);
    $update_is_check->execute();
}
// if is_check is false, switch to true
else{
    $update_is_check = $bdd->prepare('UPDATE create_todos SET is_check = 1 WHERE id_todos = :id_todos');
    $update_is_check->bindParam(':id_todos', $_GET['id_todos']);
    $update_is_check->execute();
}
header('Location: ../../layouts/todos.php');
?>