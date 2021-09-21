<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(isset($_SESSION['id_news']) && !empty($_POST['modifyDate']) && !empty($_POST['modifyNews'])){
    $modify_todos = $bdd->prepare('UPDATE whatsnew SET currentdate = :modifyDate, new = :modifyNews WHERE id = :id_news');
    $modify_todos->bindParam(':modifyDate', $_POST['modifyDate'], PDO::PARAM_STR);
    $modify_todos->bindParam(':modifyNews', $_POST['modifyNews'], PDO::PARAM_STR);
    $modify_todos->bindParam(':id_news', $_SESSION['id_news']);
    $modify_todos->execute();
}
header('Location: ../../layouts/news.php');
?>