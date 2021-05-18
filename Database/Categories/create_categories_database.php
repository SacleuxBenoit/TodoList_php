<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(!empty($_POST['newCategories'])){
    $create_categories = $bdd->prepare('INSERT INTO categories(id_user,categories) VALUES(:id_user, :categories)');
    $create_categories->bindParam(':id_user', $_SESSION['id_user']);
    $create_categories->bindParam(':categories', $_POST['newCategories']);
    $create_categories->execute();

    header('Location: ../../layouts/todos.php');
}else{
    header('Location: ../../layouts/todos.php');
}

?>