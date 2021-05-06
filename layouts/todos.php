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
    <link rel="stylesheet" href="../css/style_todos.css">
    <title>TodoList</title>
</head>
<body>

    <header>
        <h1><a href="http://localhost:8888/test/TodoList_php/database/user/user_logout_database.php">Todo List</a></h1>
    </header>

    <form action="../Database/Todos/todos_create_database.php" method="post" class="createTodos">
        <label for="addTask" class="titleTask">your task :</label>

        <p>
            <input type="text" class="addTask" name="addTask" id="addTask">
        </p>

        <select name="categories" id="categories">
            <option value='none'>none</option>
            <option value='Monday'>Monday</option>
            <option value='Tuesday'>Tuesday</option>
            <option value='Wednesday'>Wednesday</option>
        </select> 

            <input type="submit" value="Envoyer">
    </form>

    <div class="divCategories">
        <p>
            <h2> Categories <button onclick="showForm()">+</button> </h2> 
        </p>

        <form action="../Database/Categories/create_categories_database.php" id="formHidden" style='visibility:hidden'>
            <input type="text">
            <input type="submit" value="Submit">
        </form>

        <nav>
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
        </nav>
    </div>

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