<?php
 session_start();
 include('../../login_database.php');
 include('../connection_database.php');

 $user_login = $bdd->prepare('SELECT id,username,pass FROM user WHERE username = :username');
 $user_login->bindParam(':username', $_POST['LoginPseudo']);
 $user_login->execute();
 $donnees = $user_login->fetch();

 $_SESSION['username'] = $_POST['LoginPseudo'];
 $_SESSION['id_user'] = $donnees['id'];
 
 if(isset($_POST['LoginPseudo'])){
    if($_POST['LoginPseudo'] == $donnees['username'] && password_verify($_POST['LoginPass'],$donnees['pass'])){
        header('Location: ../../layouts/todos/todos.php');
    }else{
        header('Location: ../../layouts/user_connection.php');
    }
 }

 ?> 