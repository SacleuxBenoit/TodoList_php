<?php
    session_start();
    include('../login_database.php');
    include('../Database/connection_database.php');

    if(empty($_SESSION['username'])){
        header('Location: ./layouts/user_connection.php');
    }

    $select_categories = $bdd->prepare('SELECT DISTINCT categories FROM categories WHERE id_user = :id_user');
    $select_categories->bindParam(':id_user', $_SESSION['id_user']);
    $select_categories->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- import font -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/css_components/header.css">
    <link rel="stylesheet" href="../css/css_components/navBar.css">

    <title>Settings | TodoList</title>
</head>
<body>

<?php
    include('../components/header.php');
    include('../components/navBar_categories.php');
?>
                <!-- ------------------------------------ DELETE CATEGORIES / ACCOUNT / DARKMODE - START ------------------------------------ -->

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

                <input type="submit" value="DELETE">
            </form>
        </p>

        <p>
            <form action="../Database/User/user_darkMode_database.php" method="post">
                <label for="darkMode">Dark mode :</label>
                    <select name="darkMode" id="darkMode">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                <input type="submit" value="Submit">

            </form>
            <p>
                <button onclick="deleteAccount()">DELETE ACCOUNT</button>
            </p>
        </p>
                <!-- ------------------------------------ DELETE CATEGORIES / ACCOUNT / DARKMODE - END ------------------------------------ -->
                <!-- ------------------------------------ ADMIN PANEL - START ------------------------------------ -->
            <?php
                $verify_currentUser_is_admin = $bdd->prepare('SELECT is_superAdmin FROM user WHERE id = :id_user');
                $verify_currentUser_is_admin->bindParam(':id_user', $_SESSION['id_user']);
                $verify_currentUser_is_admin->execute();

                $fetch_verify_currentUser_is_admin = $verify_currentUser_is_admin->fetch();

                if($fetch_verify_currentUser_is_admin['is_superAdmin']){
                    ?>
                        <form action="../Database/Admin/promoteNewAdmin_database.php" method="post">
                            <div class="adminPanel">
                                <div class="promoteAdmin">
                                    <p>
                                        <label for="newAdmin">promote an admin :</label>
                                        <input type="text" name="newAdmin" id="newAdmin">
                                        <input type="submit" value="<- Promote">
                                    </p>
                                </div>
                            </form>
                        <?php
                            $find_user_admin = $bdd->prepare('SELECT username FROM user WHERE is_admin = 1');
                            $find_user_admin->execute();
                        ?>

                        <form action="../Database/Admin/destitute_admin_database.php" method="post">
                            <div class="destituteAdmin">
                                <p>
                                    <label for="destituteAdmin">Destitute an admin :</label>
                                    <select name="destituteAdmin" id="destituteAdmin">
                                        <?php
                                            while($fetch_find_user_admin = $find_user_admin->fetch()){
                                                echo '<option>' . $fetch_find_user_admin['username'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <input type="submit" value="<- Destitute">
                                </p>
                            </div>

                            </div>
                        </form>
                    <?php       
                }
            ?>

    </div>
                <!-- ------------------------------------ ADMIN PANEL - END ------------------------------------ -->
                <!-- ------------------------------------ CHANGE USERNAME - START ------------------------------------ -->

    <div class="div_user_settings">

        <form action="../Database/User/Settings/settings_username.php" method="post" id="formChangeUsername">

            <p>
                <label for="settingsUsername">New username :</label>
                <input type="text" name="settingsUsername" id="settingsUsername" required>
            </p>


            <p>
                <label for="verifyPassword">password :</label>
                <input type="password" name="verifyPassword" id="verifyPassword" required>
            </p>

            <input type="submit" value="Change username">
        </form>
                <!-- ------------------------------------ CHANGE USERNAME - END ------------------------------------ -->

                <!-- ------------------------------------ CHANGE PASSWORD - START ------------------------------------ -->

        <form action="../Database/User/Settings/settings_password.php" method="post">

            <p>
                <label for="settingsCurrentPassword">Current password :</label>
                <input type="password" name="settingsCurrentPassword" id="settingsCurrentPassword" required>
            </p>

            <p>
                <label for="settingsNewPassword">New password :</label>
                <input type="password" name="settingsNewPassword" id="settingsNewPassword" required>
            </p>

            <p>
                <label for="confirmNewPassword">confirm password :</label>
                <input type="password" name="confirmNewPassword" id="confirmNewPassword" required>
            </p>
            <input type="submit" value="Change password">

        </form>
    </div>
            <!-- ------------------------------------ CHANGE PASSWORD - END ------------------------------------ -->
<script src="../js/script.js"></script>
</body>
</html>