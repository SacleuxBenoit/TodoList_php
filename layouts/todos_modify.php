<?php
session_start();
include('../Database/connection_database.php');
include('../login_database.php');
include('../components/verify_darkMode.php');

if(empty($_GET['id_todos'])){
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
    <link rel="stylesheet" href="../css/style_modify.css">
    <link rel="stylesheet" href="../css/css_components/style_components_header.css">
    <link rel="stylesheet" href="../css/css_components/style_components_navBar.css">
    <title>TodoList - Modify</title>
</head>
<body>
    <?php 
    
        $id = $_GET['id_todos'];

        $todos = $bdd->prepare('SELECT task FROM create_todos WHERE id_todos = :id');
        $todos->bindParam(':id', $id);
        $todos->execute();
        $get_todos = $todos->fetch();
    ?>

    <?php
        include('../components/header.php');
        echo '<h2 class="titleModify">' . '<a href="./todos.php">' . 'Modify :' . '</a>' . '</h2>'; 
    ?>

    <form action="../Database/Todos/todos_modify_database.php?id_todos=<?php echo $id?>" method="post" class="createTodos">

        <p>
            <label for="modifyTask">your task :</label>
        </p>
        <p>
            <textarea id="modifyTask" name="modifyTask" rows="10" cols="40"><?php echo $get_todos['task']?></textarea>
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
            <option value='Monday'>Monday</option>
            <option value='Tuesday'>Tuesday</option>
            <option value='Wednesday'>Wednesday</option>
        </select> 
        
        <input type="submit" value="Envoyer">
    </form>

    <?php
        include('../components/navBar_categories.php');
    ?>

    <div class="divTodos">
        <?php
            $display_categories = $bdd->prepare('SELECT * FROM create_todos WHERE id_user = :id_user ORDER BY order_todos');
            $display_categories->bindParam(':id_user', $_SESSION['id_user']);
            $display_categories->execute();

            while($donnees = $display_categories->fetch()){
        ?>        

            <div class="todosTask">         
                <p><?php echo htmlspecialchars($donnees['task']) . ' - ' . $donnees['categories']?></p>

            </div>  

        <?php
            } 
        ?>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>