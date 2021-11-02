<?php
session_start();   
include('../connection_database.php');
include('../../login_database.php');
    
// modify the category

    if(!empty($_POST['newCategories']) && !empty($_POST['modifyCategoriesName'])){
        $modify_todos = $bdd->prepare('UPDATE categories SET categories = :newCategories WHERE categories = :oldCategories');
        $modify_todos->bindParam(':newCategories', $_POST['newCategories'], PDO::PARAM_STR);
        $modify_todos->bindParam(':oldCategories', $_POST['modifyCategoriesName'], PDO::PARAM_STR);
        $modify_todos->execute();
    }

header('Location: ../../layouts/todos.php');
?>