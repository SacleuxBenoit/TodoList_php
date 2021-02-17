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
    <link rel="stylesheet" href="../css/style_home.css">
    <title>Document</title>
</head>
<body>

    <header>
        <h1><a href="../index.php">Todo List</a></h1>
    </header>

    <form action="../Database/Todos/todos_create_database.php" method="post" class="createTodos">
        <label for="addTask" class="titleTask">your task :</label>

        <p>
            <textarea id="addTask" name="addTask" rows="10" cols="40"></textarea>
        </p>

        <p>
            <label for="deadLine">Deadline :</label>
            <input type="datetime-local" name="deadLine" id="deadLine">
        </p>

            <input type="submit" value="Envoyer">
    </form>


    <div class="divTodos">
        <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=TodoList;charset=utf8', $_SESSION['user'], $_SESSION['pass']);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            $display_todos = $bdd->query('SELECT * FROM create_todos LIMIT 10');

            while($donnees = $display_todos->fetch()){
                ?>                   
                        <p class="todosTask"><?php echo htmlspecialchars($donnees['task'])?></p>
                        <p><?php echo htmlspecialchars($donnees['deadLine']) ?></p>
                        <a href="../Database/Todos/todos_delete_database.php?id=<?php echo $donnees['id']; ?>">Delete</a> |
                        <a href="./todos_modify.php?id=<?php echo $donnees['id']; ?>">Modify</a>
                <?php
            } 
        ?>

        <p>
            <a href="../Database/Todos/todos_deleteALL_database.php"  class="deleteALL" >DELETE EVERY TODOS</a>
        </p>

    </div>
</body>
</html>