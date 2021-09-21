<?php
session_start();
include('../../login_database.php');
include('../../Database/connection_database.php');

$_SESSION['id_news'] = $_GET['id_news'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- import font -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    </style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/news_modify.css">
    <link rel="stylesheet" href="../../css/css_components/header.css">
    <link rel="stylesheet" href="../../css/css_components/navBar.css">
    <title>Document</title>
</head>
<body>
    <?php
        include('../../components/header.php');
        include('../../components/navBar_categories.php');
    ?>
    <form action="../../Database/Admin/modifyNews_database.php" method="post">
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