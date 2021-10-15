<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(!empty($_POST['currentDate']) && !empty($_POST['new'])){
    $create_article = $bdd->prepare('INSERT INTO whatsnew(id_user,currentdate, new) VALUES(:id_user,:currentdate,:new)');
    $create_article->bindParam(':id_user', $_SESSION['id_user']);
    $create_article->bindParam(':currentdate', $_POST['currentDate'], PDO::PARAM_STR);
    $create_article->bindParam(':new', $_POST['new'], PDO::PARAM_STR);
    $create_article->execute();
}

header('Location: ../../layouts/News.php');
?> 