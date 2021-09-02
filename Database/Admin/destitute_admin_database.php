<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

if(!empty($_POST['destituteAdmin'])){
    $promote_admin = $bdd->prepare('UPDATE user SET is_admin = 0 WHERE username =:username');
    $promote_admin->bindParam(':username', $_POST['destituteAdmin']);
    $promote_admin->execute();
}
header('Location: ../../layouts/settings.php');

?>