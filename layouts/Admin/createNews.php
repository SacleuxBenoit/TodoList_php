<?php
session_start();
include('../../login_database.php');
include('../../Database/connection_database.php');
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
    <link rel="stylesheet" href="../../css/news/createNews.css">
    <link rel="stylesheet" href="../../css/css_components/header.css">
    <link rel="stylesheet" href="../../css/css_components/navBar.css">
    <title>update whats new | TodoList</title>
</head>
<body>
    <?php
        include('../../components/header.php');
        include('../../components/navBar_categories.php');
    ?>

    <div class="updateWhatsNew">
        <h1><a href="../todos.php">Create news :</a></h1>
        <form action="../../Database/Admin/createNews_database.php" method="POST">

            <p>
                <textarea name="news" id="news" cols="30" rows="10" required placeholder="here is the content..."></textarea>
            </p>

            <p>
                <label for="currentDate">Date : </label>
                <input type="text" name="currentDate" id="currentDate" placeholder="ex : 11/02/21" required>
            </p>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <script src="../../js/script.js"></script>
</body>
</html>