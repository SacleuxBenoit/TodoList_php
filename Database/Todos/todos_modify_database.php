<?php
session_start();   
include('../connection_database.php');
include('../../login_database.php');
    $id = $_GET['id_todos'];
    
    $modify_todos = $bdd->prepare('UPDATE create_todos SET task = :task, categories = :categories, updatedAT = NOW() WHERE id_todos = :id');
    $modify_todos->bindParam(':task', $_POST['modifyTask'], PDO::PARAM_STR);
    $modify_todos->bindParam(':categories', $_POST['categories'], PDO::PARAM_STR);
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