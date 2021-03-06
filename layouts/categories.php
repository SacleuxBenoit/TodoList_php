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
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        if($fetch_select_darkMode['darkMode']){
        ?>
            <link rel="stylesheet" href="../css/darkMode/darkMode_categories.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_header.css">
            <link rel="stylesheet" href="../css/darkMode/darkMode_components/darkMode_navBar.css">
        <?php
        }else{
        ?>
            <link rel="stylesheet" href="../css/style_categories.css">
            <link rel="stylesheet" href="../css/css_components/style_components_header.css">
            <link rel="stylesheet" href="../css/css_components/style_components_navBar.css">
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

    <div class="divTodos">
        <?php
            $display_categories = $bdd->prepare('SELECT * FROM create_todos WHERE categories = :categories AND id_user = :id_user ORDER BY order_categories');
            $display_categories->bindParam(':categories', $_SESSION['categories']);
            $display_categories->bindParam(':id_user', $_SESSION['id_user']);
            $display_categories->execute();

            while($donnees = $display_categories->fetch()){
        ?>        

            <div class="todosTask">         
                <p><?php echo htmlspecialchars($donnees['task'])?></p>

                <p>
                    <a href="../Database/Todos/todos_delete_database.php?id_todos_from_categories=<?php echo $donnees['id_todos']; ?>">Delete</a> |
                    <a href="./todos_modify.php?id_todos=<?php echo $donnees['id_todos']; ?>">Modify</a>
                </p>

                <p>
                    <a href="../Database/Todos/todos_orderUp_database.php?order_categories=<?php echo $donnees['id_todos']?>">Up</a> |
                    <a href="../Database/Todos/todos_orderDown_database.php?order_categories=<?php echo $donnees['id_todos']?>">Down</a> |

                        <?php 
                            if($donnees['order_categories'] > 0){
                                echo $donnees['order_categories'] . ' |';
                        ?>
                            <a href="../Database/Todos/todos_pin_database.php?order_categories=<?php echo $donnees['id_todos']?>">pin</a>
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
    </div>

    <script src="../js/script.js"></script>
</body>
</html>