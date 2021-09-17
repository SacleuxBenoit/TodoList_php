<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <p>
            <label for="modifyDate">Date :</label>
            <input type="text" name="modifyDate" id="modifyDate">
        </p>

        <p>
            <label for="modifyNews">News :</label>
            <input type="text" id="modifyNews" name="modifyNews">
        </p>

        <input type="submit" value="Submit">
    </form>
</body>
</html>