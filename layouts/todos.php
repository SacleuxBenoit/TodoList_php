<?php
session_start();
include('../pass.php')
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

            <input type="submit" value="Envoyer">
    </form>


    <div class="divTodos">
        <?php
        include('../Database/connection_database.php');
        include('../pass.php');

            $display_todos = $bdd->prepare('SELECT * FROM create_todos WHERE id_user = :id_user');
            $display_todos->bindParam(':id_user', $_SESSION['id_user']);
            $display_todos->execute();

            while($donnees = $display_todos->fetch()){
                ?>        

                <div class="todosTask">         
                        <p><?php echo htmlspecialchars($donnees['task'])?></p>
                        <a href="../Database/Todos/todos_delete_database.php?id=<?php echo $donnees['id']; ?>">Delete</a> |
                        <a href="./todos_modify.php?id=<?php echo $donnees['id']; ?>">Modify</a>
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