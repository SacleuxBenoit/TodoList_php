<?php
session_start();   
include('../connection_database.php');

    $id = $_GET['id'];
    
    $modify_todos = $bdd->prepare('UPDATE create_todos SET task = :task, deadline = :deadline WHERE id = :id');
    $modify_todos->bindParam(':task', $_POST['modifyTask']);
    $modify_todos->bindParam(':deadline', $_POST['modifyDeadline']);
    $modify_todos->bindParam(':id', $id);
    $modify_todos->execute();

    if($modify_todos){
        header('Location: ../../layouts/home.php');
    }else{
        echo "Error with the modification of the todos";
    }
    ?>
</body>
</html>