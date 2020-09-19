<?php
session_start();
include('pass.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Todo List</h1>

    <form action="./Database/user_todos_database.php" method="post">

    <p>
        <label for="addTitle">Title</label>
        <input type="text" name="addTitle" id="addTitle">
    </p>

    <p>
        <label for="addTask">Task</label>
        <textarea id="addTask" name="addTask" rows="10" cols="40"></textarea>
    </p>

        <input type="submit" value="Envoyer">
    </form>


    <div>
        <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=TodoList;charset=utf8', 'root', $_SESSION['pass']);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            $display_todos = $bdd->query('SELECT * FROM create_todos LIMIT 10');

            while($donnees = $display_todos->fetch()){
                ?>
                <div><h2><?php echo htmlspecialchars($donnees['title'])?></h2>
                <?php echo htmlspecialchars($donnees['task'])?></div>
                <a href="./Database/todos_delete_database.php?id=<?php echo $donnees['id']; ?>">Delete</a>
                <?php
            }

        ?>
    </div>
</body>
</html>