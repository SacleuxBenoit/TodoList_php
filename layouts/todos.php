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
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <?php
        if($fetch_select_darkMode['darkMode']){
        ?>
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_header.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_navBar.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_todos.css">
        <?php
        }else{
        ?>
            <link rel="stylesheet" href="../css/style_todos.css">
            <link rel="stylesheet" href="../css/css_components/style_components_header.css">
            <link rel="stylesheet" href="../css/css_components/style_components_navBar.css">
        <?php
        }
    ?>

    <title>TodoList</title>
</head>
<body>

    <?php
        include('../components/header.php');
    ?>

    <form action="../Database/Todos/todos_create_database.php" method="post" class="createTodos">
        <label for="addTask" class="titleTask">your task :</label>

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

    <?php
        include('../components/navBar_categories.php');
    ?>

    <div class="divTodos">
        <?php
            $display_todos = $bdd->prepare('SELECT * FROM create_todos WHERE id_user = :id_user ORDER BY order_todos');
            $display_todos->bindParam(':id_user', $_SESSION['id_user']);
            $display_todos->execute();

            while($donnees = $display_todos->fetch()){
        ?>        
            <div class="todosTask">         
                <p><?php echo htmlspecialchars($donnees['task'])?></p>

                <p>
                    <a href="../Database/Todos/todos_delete_database.php?id_todos=<?php echo $donnees['id_todos']; ?>">Delete</a> |
                    <a href="./todos_modify.php?id_todos=<?php echo $donnees['id_todos']; ?>">Modify</a>
                </p>

                <p>
                    <a href="../Database/Todos/todos_orderUp_database.php?id_todos=<?php echo $donnees['id_todos']?>">Up</a> |
                    <a href="../Database/Todos/todos_orderDown_database.php?id_todos=<?php echo $donnees['id_todos']?>">Down</a> |

                        <?php 
                            if($donnees['order_todos'] > 0){
                                echo $donnees['order_todos'] . ' |';
                        ?>
                            <a href="../Database/Todos/todos_pin_database.php?id_todos=<?php echo $donnees['id_todos']?>">pin</a>
                        <?php
                            }
                            else{
                                echo 'message pinned';
                            }
                        ?>
                </p>
            </div>  

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