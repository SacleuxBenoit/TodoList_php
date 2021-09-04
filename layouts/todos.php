<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
include('../components/verify_darkMode.php');

if(empty($_SESSION['username'])){
    header('Location: ../index.php');
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
        if($fetch_select_darkMode['darkMode']){
        ?>
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_header.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_navBar.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_todos.css">
        <?php
        }else{
        ?>
            <!-- if darkmode is disabled : use the css below -->
            <link rel="stylesheet" href="../css/todos.css">
            <link rel="stylesheet" href="../css/css_components/header.css">
            <link rel="stylesheet" href="../css/css_components/navBar.css">
        <?php
        }
    ?>

    <title>TodoList</title>
</head>
<body>

    <?php
        include('../components/header.php');
        include('../components/navBar_categories.php');
    ?>

            <!-- ------------------------------------ CREATE TODOS - START ------------------------------------ -->
    <form action="../Database/Todos/todos_create_database.php" method="post" class="createTodos">
        <label for="addTask" class="titleTask"><u>task :</u></label>

        <p>
            <input type="text" class="addTask" name="addTask" id="addTask">
        </p>

        <select name="categories" id="categories">
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
            <option value='none'>none</option>
        </select> 

            <input type="submit" value="Envoyer">
    </form>
            <!-- ------------------------------------ CREATE TODOS - END ------------------------------------ -->
            
            <!-- ------------------------------------ DISPLAY TODOS - START ------------------------------------ -->

    <div class="divTodos">
        <?php
            $display_todos = $bdd->prepare('SELECT * FROM todos WHERE id_user = :id_user AND is_delete = false ORDER BY order_todos');
            $display_todos->bindParam(':id_user', $_SESSION['id_user']);
            $display_todos->execute();

            while($donnees = $display_todos->fetch()){
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
                    <a href="../Database/Todos/todos_orderUp_database.php?id_todos=<?php echo $donnees['id_todos']?>" class="color_lightcoral_link">Up</a> |
                    <a href="../Database/Todos/todos_orderDown_database.php?id_todos=<?php echo $donnees['id_todos']?>" class="color_lightcoral_link">Down</a> |

                        <?php 
                            if($donnees['order_todos'] > 0){
                                echo $donnees['order_todos'] . ' |';
                        ?>
                            <a href="../Database/Todos/todos_pin_database.php?id_todos=<?php echo $donnees['id_todos']?>" class="color_lightcoral_link">pin</a> |
                        <?php
                            }
                            else{
                                echo 'message pinned |';
                            }
                        ?>
                    <a href="../Database/Todos/todos_check_database.php?id_todos=<?php echo $donnees['id_todos']?>">Check todos</a>
                </p>
            </div>  
            <!-- ------------------------------------ DISPLAY TODOS - END ------------------------------------ -->
        <?php
            } 
        ?>

        <p>
            <button onclick="deleteTodos()">DELETE EVERY TODOS</button>
        </p>

    </div>
    <script src="../js/script.js"></script>
</body>
</html>