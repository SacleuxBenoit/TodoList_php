<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(isset($_POST['darkMode'])){
    $update_darkMode = $bdd->prepare('UPDATE user SET darkMode = :darkMode WHERE username =:username');
    $update_darkMode->bindParam(':darkMode', $_POST['darkMode']);
    $update_darkMode->bindParam(':username', $_SESSION['username']);
    $update_darkMode->execute();
}
header('Location: ../../layouts/settings.php');

?>