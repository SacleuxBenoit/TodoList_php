<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

// switch todos to category none + delete the current category
if(isset($_GET['categories'])){
    $update_categories = $bdd->prepare('UPDATE todos SET categories = "none" WHERE categories = :categories');
    $update_categories->bindParam(':categories', $_GET['categories']);
    $update_categories->execute();
    
    $delete_categories = $bdd->prepare('DELETE FROM categories WHERE categories = :categories');
    $delete_categories->bindParam(':categories', $_GET['categories']);
    $delete_categories->execute();

    header('Location: ../../layouts/todos.php');
    exit();
}
// delete the current category (if we came from settings.php)
else if(isset($_POST['deleteCategories'])){
    $delete_categories = $bdd->prepare('DELETE FROM categories WHERE categories = :categories');
    $delete_categories->bindParam(':categories', $_POST['deleteCategories']);
    $delete_categories->execute();

    header('Location: ../../layouts/settings.php');
    exit();
}else{
    header('Location: ../../layouts/todos.php');
}

?>