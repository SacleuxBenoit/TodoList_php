<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(!empty($_POST['currentDate']) && !empty($_POST['new'])){
    $create_article = $bdd->prepare('INSERT INTO whatsnew(currentdate, new) VALUES(:currentdate,:new)');
    $create_article->bindParam(':currentdate', $_POST['currentDate']);
    $create_article->bindParam(':new', $_POST['new']);
    $create_article->execute();
}

header('Location: ../../layouts/Admin/whatsNew.php');
?> 