<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$select_categories = $bdd->prepare('SELECT categories FROM categories WHERE id_user = :id_user');
$select_categories->bindParam(':id_user', $_SESSION['id_user']);
$select_categories->execute();

$verify_categories = $select_categories->fetch();

// verify if input newCategories isn't empty && if it doesn't exist in the database if that doesn't exist : create a new category
if(!empty($_POST['newCategories']) && $verify_categories['categories'] !== $_POST['newCategories']){
    $create_categories = $bdd->prepare('INSERT INTO categories(id_user,categories,mode) VALUES(:id_user, :categories,:mode)');
    $create_categories->bindParam(':id_user', $_SESSION['id_user']);
    $create_categories->bindParam(':categories', $_POST['newCategories'], PDO::PARAM_STR);
    $create_categories->bindParam(':mode', $_POST['categoryMode'], PDO::PARAM_STR);
    $create_categories->execute();
}
header('Location: ../../layouts/todos.php');
?>