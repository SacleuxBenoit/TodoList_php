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
        <h1><a href="../todos.php">Update news :</a></h1>
        <form action="../../Database/Admin/createNews_database.php" method="POST">
            <p>
                <label for="currentDate">date</label>
                <input type="text" name="currentDate" id="currentDate" required>
            </p>

            <p>
                <label for="news">content</label>
                <input type="text" name="news" id="news" required>
            </p>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <script src="../../js/script.js"></script>
</body>
</html>