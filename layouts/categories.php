<?php
session_start();
include('../Database/connection_database.php');
include('../login_database.php');

$categories = $_GET['categories'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style_todos.css">
    <title>TodoList - categories</title>
</head>
<body>

    <header>
        <h1><a href="http://localhost:8888/test/TodoList_php/layouts/todos.php">Todo List</a></h1>
    </header>

    <div class="divTodos">
        <?php
            $display_categories = $bdd->prepare('SELECT * FROM create_todos WHERE categories = :categories ORDER BY order_todos');
            $display_categories->bindParam(':categories', $categories);
            $display_categories->execute();

            while($donnees = $display_categories->fetch()){
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
    </div>
</body>
</html>