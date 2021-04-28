<?php
session_start();
include('../Database/connection_database.php');
include('../login_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style_modify.css">
    <title>TodoList - Modify</title>
</head>
<body>
    <?php 
    
        $id = $_GET['id_todos'];

        $todos = $bdd->prepare('SELECT task FROM create_todos WHERE id_todos = :id');
        $todos->bindParam(':id', $id);
        $todos->execute();
        $get_todos = $todos->fetch();
    ?>

    <a href="./todos.php"><h1>Modify</h1></a>

    <form action="../Database/Todos/todos_modify_database.php?id_todos=<?php echo $id?>" method="post">

        <p>
            <label for="modifyTask">Task :</label>
        </p>
        <p>
            <textarea id="modifyTask" name="modifyTask" rows="10" cols="40"><?php echo $get_todos['task']?></textarea>
        </p>

        <select name="categories" id="categories">
            <option value='none'>none</option>
            <option value='Monday'>Monday</option>
            <option value='Tuesday'>Tuesday</option>
            <option value='Wednesday'>Wednesday</option>
        </select> 
        
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>