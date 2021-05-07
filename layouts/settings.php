<?php
    session_start();
    include('../login_database.php');
    include('../Database/connection_database.php');

    if(empty($_SESSION['username'])){
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style_settings.css">
    <title>TodoList - Settings</title>
</head>
<body>

<header>
    <h1><a href="http://localhost:8888/test/TodoList_php/database/user/user_logout_database.php">Todo List</a></h1>
</header>

<div class="container">

    <form action="../Database/Settings/settings_username.php" method="post">
        <label for="settingsUsername">New username :</label>
        <input type="text" name="settingsUsername" id="settingsUsername">
        <input type="submit" value="Submit">
    </form>

    <form action="../Database/Settings/settings_password.php" method="post">
        <label for="settingsPassword">New password :</label>
        <input type="password" name="settingsPassword" id="settingsPassword">
        <input type="submit" value="Submit">
    </form>

    <p>
        <button onclick="deleteAccount()">DELETE ACCOUNT</button>
    </p>
</div>

<?php
    $get_admin = $bdd->prepare('SELECT is_admin FROM user WHERE username = :username');
    $get_admin->bindParam(':username', $_SESSION['username']);
    $get_admin->execute();

    $verify_admin = $get_admin->fetch();

    if($verify_admin['is_admin']){
    ?>
        <div>
            <a href="./admin/statistics.php">Statistics</a>
        </div>
    <?php
    }else{
        echo "isn't admin";
    }
?>

<script src="../js/script.js"></script>
</body>
</html>