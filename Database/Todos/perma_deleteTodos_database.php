<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$perma_delete = $bdd->prepare('DELETE FROM todos WHERE id_user = :id_user AND is_delete');
$perma_delete->bindParam(':id_user', $_SESSION['id_user']);
$perma_delete->execute();

header('Location: ../../layouts/todos.php');
?>