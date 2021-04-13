<?php
session_start();   
include('../connection_database.php');
include('../../login_database.php');
    $id = $_GET['id'];
    
    $modify_todos = $bdd->prepare('UPDATE create_todos SET task = :task, deadline = :deadline, updatedAT = NOW() WHERE id = :id');
    $modify_todos->bindParam(':task', $_POST['modifyTask'], PDO::PARAM_STR);
    $modify_todos->bindParam(':deadline', $_POST['modifyDeadline'], PDO::PARAM_STR);
    $modify_todos->bindParam(':id', $id);
    $modify_todos->execute();

    if($modify_todos){
        header('Location: ../../layouts/todos.php');
    }else{
        echo "Error with the modification of the todos";
    }
    ?>
</body>
</html>