<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
include('../components/verify_darkMode.php');
if(isset($_GET['categories'])){
    $_SESSION['categories'] = $_GET['categories'];
}
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
        <!-- if darkmode is enabled : use the css below -->
    <?php
        if(isset($fetch_select_darkMode['darkMode']) && $fetch_select_darkMode['darkMode']){
        ?>
            <link rel="stylesheet" href="../css/darkMode/darkMode_categories.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_header.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_navBar.css">
        <?php
        }else{
        ?>
            <!-- if darkmode is disabled : use the css below -->
            <link rel="stylesheet" href="../css/categories.css">
            <link rel="stylesheet" href="../css/css_components/header.css">
            <link rel="stylesheet" href="../css/css_components/navBar.css">
        <?php
        }
    ?>
    <title>TodoList - categories</title>
</head>
<body>

    <?php
        include('../components/header.php');
        include('../components/navBar_categories.php');

        echo '<h2 class="titleCategory">' . '<a href="./todos.php">' . '<u>' . $_SESSION['categories'] . '</u>' . '</a>' . '</h2>'; 
    ?>
            <!-- ------------------------------------ DISPLAY TODOS BY CATEGORY - START ------------------------------------ -->
    <div class="divTodos">
        <?php
            $display_categories = $bdd->prepare('SELECT * FROM create_todos WHERE categories = :categories AND id_user = :id_user AND is_delete = 0 ORDER BY order_categories');
            $display_categories->bindParam(':categories', $_SESSION['categories']);
            $display_categories->bindParam(':id_user', $_SESSION['id_user']);
            $display_categories->execute();

            while($donnees = $display_categories->fetch()){
        ?>        

            <div class="todosTask">         
                <?php
                    if($donnees['is_check']){
                        echo '<p class="colorP" style="color:green">' . htmlspecialchars($donnees['task']) .'</p>';
                    }else{
                        echo '<p class="colorP" style="color:black">' . htmlspecialchars($donnees['task']) .'</p>';
                    }
                ?>

                <p>
                    <a href="./todos_modify.php?id_todos=<?php echo $donnees['id_todos']; ?>" class="color_lightcoral_link">Modify</a> |
                    <a href="../Database/Todos/todos_addToTrash.php?id_todos=<?php echo $donnees['id_todos']; ?>" class="color_lightcoral_link">Delete</a> 
                </p>

                <p>
                    <a href="../Database/Todos/todos_orderUp_database.php?order_categories=<?php echo $donnees['id_todos']?>" class="color_lightcoral_link">Up</a> |
                    <a href="../Database/Todos/todos_orderDown_database.php?order_categories=<?php echo $donnees['id_todos']?>" class="color_lightcoral_link">Down</a> |

                        <?php 
                            if($donnees['order_categories'] > 0){
                                echo $donnees['order_categories'] . ' |';
                        ?>
                            <a href="../Database/Todos/todos_pin_database.php?order_categories=<?php echo $donnees['id_todos']?>" class="color_lightcoral_link">pin</a> |
                        <?php
                            }
                            else{
                                echo 'message pinned |';
                            }
                        ?>
                    <a href="../Database/Todos/todos_check_database.php?id_todos=<?php echo $donnees['id_todos']?>">Check todos</a>

                </p>
            </div>  
            <!-- ------------------------------------ DISPLAY TODOS BY CATEGORY - END ------------------------------------ -->
        <?php
            } 
        ?>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>