<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
if(isset($_GET['categories'])){
    $_SESSION['categories'] = $_GET['categories'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style_categories.css">
    <title>TodoList - categories</title>
</head>
<body>

    <header>
        <h1><a href="http://localhost:8888/test/TodoList_php/layouts/todos.php">Todo List</a> </h1><?php echo $_SESSION['categories'] ?>
    </header>

    <nav class="divCategories">
        <div>
            <p>
                <h2> Categories <button onclick="showForm()" id="buttonCategories" value="+">+</button> </h2> 
            </p>

            <form action="../Database/Categories/create_categories_database.php" id="formHidden" method="post" style='visibility:hidden'>
                <input type="text" id="newCategories" name="newCategories">
                <input type="submit" value="Submit">
            </form>

                <?php
                    $get_categories = $bdd->prepare('SELECT DISTINCT categories FROM create_todos WHERE id_user = :id_user ORDER BY categories');
                    $get_categories->bindParam('id_user', $_SESSION['id_user']);
                    $get_categories->execute();
    
                    while($display_categories = $get_categories->fetch()){
                        ?>
                            <div id="divCategories">
                                <ul>
                                    <li>
                                    <h2><a href="./categories.php?categories=<?php echo $display_categories['categories'];?>"> <?php echo $display_categories['categories'] ?> </a>
                                        | <a href="../Database/Categories/delete_categories_database.php?categories=<?php echo $display_categories['categories'] ?>"> x</h2> </a>
                                    </li>
                                </ul>
                            </div>
                        <?php
                    }
                ?>
        </div>
    </nav>

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