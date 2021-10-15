<?php
// verify if user is admin OR super Admin
$verify_admin = $bdd->prepare('SELECT is_admin,is_superAdmin FROM user WHERE id =:id_user');
$verify_admin->bindParam(':id_user', $_SESSION['id_user']);
$verify_admin->execute();

$fetch_verify_admin = $verify_admin->fetch();
?>
<header>
    <div>
        <p>
<<<<<<< HEAD
            <a href="http://localhost:8888/test/TodoList_php/layouts/todos.php">Todolist</a> |
            <a href="./settings.php">Settings</a>
=======
            <a href="http://localhost/TodoList_php/layouts/todos.php">Todolist</a> |
            <a href="http://localhost/TodoList_php/layouts/settings.php">Settings</a>
>>>>>>> d87cfa93000caf34b24062a93193f2efee5cf9c2
            <?php
            // if user is admin OR super admin : display link to updateWhatsNew
                if($fetch_verify_admin['is_admin'] || $fetch_verify_admin['is_superAdmin']){
                   
                echo '<a href="http://localhost/TodoList_php/layouts/Admin/createNews.php">' . "| create news |" . "</a>";
                   
                }
            ?>
            <a href="../Database/User/user_logout_database.php"> Logout</a>
        </p>

    </div>   

</header>