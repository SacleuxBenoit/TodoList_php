<?php
session_start();

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
                <option value='Aucun'>Aucun</option>
                <option value='Lundi'>Lundi</option>
                <option value='Mardi'>Mardi</option>
                <option value='Mercredi'>Mercredi</option>
            </select> 

            <input type="submit" value="Envoyer">
    </form>


    <div class="divTodos">
        <?php
        include('../Database/connection_database.php');
        include('../login_database.php');

            $display_todos = $bdd->prepare('SELECT DISTINCT * FROM create_todos WHERE id_user = :id_user ORDER BY order_todos');
            $display_todos->bindParam(':id_user', $_SESSION['id_user']);
            $display_todos->execute();

            while($donnees = $display_todos->fetch()){
                ?>        

                <div class="todosTask">         
                        <p><?php echo htmlspecialchars($donnees['task'])?></p>

                        <p>
                            <a href="../Database/Todos/todos_delete_database.php?id_todos=<?php echo $donnees['id_todos']; ?>">Delete</a> |
                            <a href="./todos_modify.php?id_todos=<?php echo $donnees['id_todos']; ?>">Modify</a> |
                            <a href="#">En cours</a>
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