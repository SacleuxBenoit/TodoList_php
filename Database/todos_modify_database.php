<?php
session_start();   
include('connection_database.php');

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