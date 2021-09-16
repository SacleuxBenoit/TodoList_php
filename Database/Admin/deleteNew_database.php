<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');


if(isset($_GET['id'])){
    $deleteNew = $bdd->prepare('DELETE FROM whatsnew WHERE id = :id');
    $deleteNew->bindParam(':id', $_GET['id']);
    $deleteNew->execute();
}
header('Location: ../../layouts/whatsNew.php');

?>