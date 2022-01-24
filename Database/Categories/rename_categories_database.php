<?php
session_start();   
include('../connection_database.php');
include('../../login_database.php');
    
// modify the category

    if(!empty($_POST['newCategories']) && !empty($_POST['modifyCategoriesName'])){
        $modify_categories = $bdd->prepare('UPDATE categories SET categories = :newCategories WHERE categories = :oldCategories');
        $modify_categories->bindParam(':newCategories', $_POST['newCategories'], PDO::PARAM_STR);
        $modify_categories->bindParam(':oldCategories', $_POST['modifyCategoriesName'], PDO::PARAM_STR);
        $modify_categories->execute();

        $modify_categories_from_todos = $bdd->prepare('UPDATE todos SET categories = :newCategories WHERE categories = :oldCategories');
        $modify_categories_from_todos->bindParam(':newCategories', $_POST['newCategories'], PDO::PARAM_STR);
        $modify_categories_from_todos->bindParam(':oldCategories', $_POST['modifyCategoriesName'], PDO::PARAM_STR);
        $modify_categories_from_todos->execute();
        
    }

header('Location: ../../layouts/todos/todos.php');
?>