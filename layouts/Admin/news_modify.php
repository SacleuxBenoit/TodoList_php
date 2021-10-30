<?php
session_start();
include('../../login_database.php');
include('../../Database/connection_database.php');

$_SESSION['id_news'] = $_GET['id_news'];
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
    <link rel="stylesheet" href="../../css/news/news_modify.css">
    <link rel="stylesheet" href="../../css/css_components/header.css">
    <link rel="stylesheet" href="../../css/css_components/navBar.css">
    <title>Document</title>
</head>
<body>
    <?php
        include('../../components/header.php');
        include('../../components/navBar_categories.php');

        /* --------------------- SELECT CURRENT DATE && NEWS --------------------- */

        $select_news = $bdd->prepare('SELECT currentdate,news FROM whatsnew WHERE id =:id');
        $select_news->bindParam(':id', $_GET['id_news']);
        $select_news->execute();

        $news_found = $select_news->fetch();
    ?>
    <form action="../../Database/Admin/modifyNews_database.php" method="post">
    <div class="container_news_modify">
        <p>
                <label for="modifyDate">Date :</label>
                <input type="text" name="modifyDate" id="modifyDate" value="<?php echo $news_found['currentdate']?>">
            </p>

            <p>
                <label for="modifyNews">News :</label>
                <input type="text" id="modifyNews" name="modifyNews" value="<?php echo $news_found['news']?>">
            </p>

            <input type="submit" value="Submit">
        </div>

    </form>
</body>
</html>