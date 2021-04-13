<?php
 session_start();
 include('../../login_database.php');
 include('../connection_database.php');

 if(empty($_POST['RegisterPseudo']) || empty($_POST['RegisterPass'])){
     header('Location: ../../index.php');
 }else{
     $pass_hash = password_hash($_POST['RegisterPass'], PASSWORD_DEFAULT);
     $user_info = $bdd->prepare('INSERT INTO user(username,pass) VALUES(:RegisterPseudo, :pass)');
     $user_info->bindParam(':RegisterPseudo', $_POST['RegisterPseudo']);
     $user_info->bindParam(':pass', $pass_hash);
     $user_info->execute();
     header('Location: ../../index.php');
 }

 ?>