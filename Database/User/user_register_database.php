<?php
session_start();
include('../../login_database.php');
include('../connection_database.php');

$_SESSION['username'] = $_POST['RegisterPseudo'];


    // Verify if username already exist in the database

    $get_username = $bdd->prepare('SELECT username FROM user WHERE username = :username');
    $get_username->bindParam(':username', $_POST['RegisterPseudo']);
    $get_username->execute();

    $verify_username = $get_username->fetch();

    if(!$verify_username && !empty($_POST['RegisterPseudo'])){
        $pass_hash = password_hash($_POST['RegisterPass'], PASSWORD_DEFAULT);
        $user_info = $bdd->prepare('INSERT INTO user(username,pass) VALUES(:RegisterPseudo, :pass)');
        $user_info->bindParam(':RegisterPseudo', $_POST['RegisterPseudo']);
        $user_info->bindParam(':pass', $pass_hash);
        $user_info->execute();
   
        $user_id = $bdd->prepare('SELECT id FROM user WHERE username = :username');
        $user_id->bindParam(':username', $_POST['RegisterPseudo']);
        $user_id->execute();
   
        $get_user_id = $user_id->fetch();
   
        $_SESSION['id_user'] = $get_user_id['id'];
        
        header('Location: ../../layouts/todos.php');
    }else{
        header('Location: ../../index.php');
    }

 ?>