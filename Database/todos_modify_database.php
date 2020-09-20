<?php
session_start();
include('../pass.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>

    <h1>Modify</h1>

    <form action="../home.php" method="post">

    <p>
        <label for="modifyTitle">Title</label>
        <input type="text" name="modifyTitle" id="modifyTitle">
    </p>

    <p>
        <label for="modifyTask">Task</label>
        <textarea id="modifyTask" name="modifyTask" rows="10" cols="40"></textarea>
    </p>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>