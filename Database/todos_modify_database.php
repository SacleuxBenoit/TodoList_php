<?php
session_start();
include('../pass.php');

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=TodoList;charset=utf8', 'root', $_SESSION['pass']);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $id = $_GET['id'];
    
    $modify_todos = $bdd->prepare('UPDATE create_todos SET title = :title, task = :task WHERE id = :id');
    $modify_todos->bindParam(':title', $_POST['modifyTitle']);
    $modify_todos->bindParam(':task', $_POST['modifyTask']);
    $modify_todos->bindParam(':id', $id);
    $modify_todos->execute();

    if($modify_todos){
        header('Location: ../home.php');
    }else{
        echo "Error with the modification of the todos";
    }
    ?>
</body>
</html>