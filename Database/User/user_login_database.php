<?php
 session_start();
 include('../../pass.php');
 include('../connection_database.php');

 $user_login = $bdd->prepare('SELECT username,pass FROM user WHERE username = :username');
 $user_login->bindParam(':username', $_POST['LoginPseudo']);
 $user_login->execute();
 $donnees = $user_login->fetch();

 if($_POST['LoginPseudo'] == $donnees['username'] && password_verify($_POST['LoginPass'],$donnees['pass'])){
     header('Location: ../../layouts/todos.php');
 }else{
     header('Location: ../../index.php');
 }
 ?> 