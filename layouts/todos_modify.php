<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style_modify.css">
    <title>Document</title>
</head>
<body>
    <?php $id = $_GET['id']?>
<a href="./home.php"><h1>Modify</h1></a>

<form action="../Database/Todos/todos_modify_database.php?id=<?php echo $id?>" method="post">

    <p>
        <label for="modifyTask">Task</label>
        <textarea id="modifyTask" name="modifyTask" rows="10" cols="40"></textarea>
    </p>

    <p>
        <label for="modifyDeadline">Deadline :</label>
        <input type="datetime-local" name="modifyDeadline" id="modifyDeadline">
    </p>

    <input type="submit" value="Envoyer">
</form>
</body>
</html>