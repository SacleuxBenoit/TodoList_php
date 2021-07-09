<?php
    session_start();
    include('../login_database.php');
    include('../Database/connection_database.php');

    if(empty($_SESSION['username'])){
        header('Location: ../index.php');
    }

    $select_categories = $bdd->prepare('SELECT DISTINCT categories FROM categories WHERE id_user = :id_user');
    $select_categories->bindParam(':id_user', $_SESSION['id_user']);
    $select_categories->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css_components/style_components_header.css">
    <link rel="stylesheet" href="../css/style_settings.css">
    <title>TodoList - Settings</title>
</head>
<body>

<header>
    <h1><a href="http://localhost:8888/test/TodoList_php/layouts/todos.php">Todo List</a></h1>
</header>

<div class="div_todos_settings">
    <p>
        <form action="../Database/Categories/delete_categories_database.php" method="post">
            <label for="deleteCategories">Delete categories :</label>
            <select name="deleteCategories" id="deleteCategories">
                <?php
                    $get_categories = $bdd->prepare('SELECT DISTINCT categories FROM categories WHERE id_user = :id_user');
                    $get_categories->bindParam(':id_user', $_SESSION['id_user']);
                    $get_categories->execute();

                    while($display_categories = $get_categories->fetch()){
                        ?>
                            <option><?php echo $display_categories['categories'] ?></option>
                        <?php
                    }
                ?> 
            </select> 

            <input type="submit" value="Submit">
        </form>
    </p>

    <p>
        <form action="#" method="post">
            <label for="darkMode">Dark mode :</label>
                <select name="darkMode" id="darkMode">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>

            <input type="submit" value="Submit">

        </form>
    </p>
</div>

<div class="div_user_settings">

    <form action="../Database/User/Settings/settings_username.php" method="post">
        <label for="settingsUsername">New username :</label>
        <input type="text" name="settingsUsername" id="settingsUsername">
        <input type="submit" value="Submit">
    </form>

    <form action="../Database/User/Settings/settings_password.php" method="post">
        <label for="settingsPassword">New password :</label>
        <input type="password" name="settingsPassword" id="settingsPassword">
        <input type="submit" value="Submit">
    </form>

    <p>
        <button onclick="deleteAccount()">DELETE ACCOUNT</button>
    </p>
</div>

<script src="../js/script.js"></script>
</body>
</html>