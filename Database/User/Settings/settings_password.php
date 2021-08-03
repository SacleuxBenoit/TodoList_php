<?php
session_start();
include('../../../login_database.php');
include('../../connection_database.php');

/* ---------------- FIND THE PASSWORD IN DATABASE ---------------- */ 
$get_pass = $bdd->prepare('SELECT pass FROM user WHERE username =:username');
$get_pass->bindParam(':username', $_SESSION['username']);
$get_pass->execute();

$fetch_get_pass = $get_pass->fetch();

/*if(!empty($_POST['settingsPassword'])){

}else{
    header('Location: ../../../layouts/settings.php');
}*/

// verify is password correspond to the password that is in database

if(password_verify($_POST['settingsCurrentPassword'],$fetch_get_pass['pass']) && $_POST['settingsNewPassword'] == $_POST['confirmNewPassword']){
    $pass_hash = password_hash($_POST['settingsNewPassword'], PASSWORD_DEFAULT);

    $update_password = $bdd->prepare('UPDATE user SET pass = :pass WHERE username = :username');
    $update_password->bindParam(':pass', $pass_hash);
    $update_password->bindParam(':username', $_SESSION['username']);
    $update_password->execute();
    header('Location: ../../../index.php');
}else{
   header('Location: ../../../layouts/settings.php');
}

?>