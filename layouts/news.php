<?php
session_start();
include('../login_database.php');
include('../Database/connection_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- import font -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/news/news.css">
    <link rel="stylesheet" href="../css/css_components/header.css">
    <link rel="stylesheet" href="../css/css_components/navBar.css">
    <title>news | Todolist</title>
</head>
<body>
    <?php
        include('../components/header.php');
        include('../components/navBar_categories.php');
        
        /* -------------------- VERIFY IS USER IS ADMIN --------------------*/

        $verify_user_is_admin = $bdd->prepare('SELECT is_admin FROM user WHERE id =:id_user');
        $verify_user_is_admin->bindParam(':id_user', $_SESSION['id_user']);
        $verify_user_is_admin->execute();

        $user_admin = $verify_user_is_admin->fetch();

        /* -------------------- DISPLAY NEWS --------------------*/

        $select_articles = $bdd->prepare('SELECT * FROM whatsnew');
        $select_articles->execute();

        ?>
            <div class="news">
        <?php
        while($display_articles = $select_articles->fetch()){
            ?>
                <h1 class="underlineH1">
                    <?php 
                        echo $display_articles['currentdate'];
                    ?>
                </h1>

                <p>
                    <?php
                        echo $display_articles['news'];
                    ?>
                </p>
        
                <?php
                    /* -------------------- IF USER IS ADMIN ADD LINK FOR MODIFY && DELETE --------------------*/
                    
                    if($user_admin['is_admin']){
                    ?>
                        <p>
                            <a href="./Admin/news_modify.php?id_news=<?php echo $display_articles['id']; ?>">Modify</a> |
                            <a href="../Database/Admin/deleteNews_database.php?id=<?php echo $display_articles['id']; ?>">Delete</a>
                        </p>
                    <?php
                    }
                ?>
            <?php
        }
    ?>
            </div>

<script src="../js/script.js"></script>
</body>
</html>