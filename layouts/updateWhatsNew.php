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
    <link rel="stylesheet" href="../css/css_components/header.css">
    <link rel="stylesheet" href="../css/css_components/navBar.css">
    <title>update whats new | TodoList</title>
</head>
<body>
    <?php
        include('../components/header.php');
        include('../components/navBar_categories.php');
    ?>
    <form action="#">
        <p>
            <label for="date">date</label>
            <input type="text" name="date" id="date">
        </p>

        <p>
            <label for="content">content</label>
            <input type="text" name="content" id="content">
        </p>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>