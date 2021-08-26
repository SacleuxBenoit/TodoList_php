<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_deleted_tasks.css">
    <link rel="stylesheet" href="../css/css_components/style_components_header.css">
    <link rel="stylesheet" href="../css/css_components/style_components_navBar.css">
    <title>TodoList - deleted tasks</title>
</head>
<body>
    <?php
        include('../components/header.php');
        include('../components/navBar_categories.php');
    ?>
        <h2>Deleted tasks :</h2>
    <?php
        $get_todos_deleted = $bdd->prepare('SELECT * FROM create_todos WHERE id_user =:id_user AND is_delete = true');
        $get_todos_deleted->bindParam(':id_user', $_SESSION['id_user']);
        $get_todos_deleted->execute();

        while($display_todos = $get_todos_deleted->fetch()){
            ?>        
            <div class="todosTask">         
                <p><?php echo htmlspecialchars($display_todos['task'])?></p>

                <p>
                    <a href="#" class="color_lightcoral_link">RESTORE</a> |
                    <a href="../Database/Todos/todos_delete_database.php?id_todos=<?php echo $display_todos['id_todos']; ?>" class="color_lightcoral_link">DELETE</a>
                </p>
            </div>  
        <?php
            } 
        ?>
</body>
</html>