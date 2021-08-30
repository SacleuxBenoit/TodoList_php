<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
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
    <link rel="stylesheet" href="../css/whatsNew.css">
    <link rel="stylesheet" href="../css/css_components/header.css">
    <link rel="stylesheet" href="../css/css_components/navBar.css">
    <title>What's new | Todolist</title>
</head>
<body>
    <?php
        include('../components/header.php');
        include('../components/navBar_categories.php');
    ?>

    <div class="titleNews">
        <h2>What's new ?</h2>
    </div>

    <div class="news">
        <div>
            <u>28/08/2021 && 29/08/2021</u>

            <p>
                creation of the part :<a href="./deleted_tasks.php">Delete tasks</a> : once a todo is deleted, it end up <a href="./deleted_tasks.php">here</a>, the user has the possibility
                of permanently deleting the todo OR restoring it.
            </p>

            <p>
                the 'check todos' part has been created, user can now change the color of a todo to green.
            </p>
        </div>
    </div>
     

</body>
</html>