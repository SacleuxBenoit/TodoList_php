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
    <title>Modify todos</title>
</head>
<body>
    <?php $id = $_GET['id'];

    $todos = $bdd->prepare('SELECT task FROM create_todos WHERE id = :id');
    $todos->bindParam(':id', $id);
    $todos->execute();
    $get_todos = $todos->fetch();
    ?>
<a href="./todos.php"><h1>Modify</h1></a>

<form action="../Database/Todos/todos_modify_database.php?id=<?php echo $id?>" method="post">

    <p>
        <label for="modifyTask">Task :</label>
    </p>
    <p>
        <textarea id="modifyTask" name="modifyTask" rows="10" cols="40"><?php echo $get_todos['task']?></textarea>
    </p>

    <input type="submit" value="Envoyer">
</form>
</body>
</html>