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
    <form action="../Database/Admin/updateWhatsNew_database.php" method="POST">
        <p>
            <label for="currentDate">date</label>
            <input type="text" name="currentDate" id="currentDate">
        </p>

        <p>
            <label for="new">content</label>
            <input type="text" name="new" id="new">
        </p>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>