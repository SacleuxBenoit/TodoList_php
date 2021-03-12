<?php
 session_start();
 include('../../pass.php');
 include('../connection_database.php');

 $user_settings = $bdd->prepare('SELECT id,username,pass FROM user WHERE username = :username');
 $user_settings->bindParam(':username', $_POST['SettingsPseudo']);
 $user_settings->execute();
 $donnees = $user_settings->fetch();

 $_SESSION['username'] = $_POST['SettingsPseudo'];
 $_SESSION['id_user'] = $donnees['id'];
 
 if(isset($_POST['SettingsPseudo'])){
    if($_POST['SettingsPseudo'] == $donnees['username'] && password_verify($_POST['SettingsPass'],$donnees['pass'])){
        header('Location: ../../layouts/settings.php');
    }else{
        header('Location: ../../index.php');
    }
 }

 ?> 