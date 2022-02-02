<?php
session_start();
include('./login_database.php');
include('./Database/connection_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- import font -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" type="image/jpg" href="./images/favicon.png"/>
    <title>Todolist</title>
</head>
<body>
    <header>
        <h1>TaskHead</h1>

        <a href="layouts/user_connection.php">login / register</a>
    </header>

    <main>
        <div class="descriptionOfTodolist">

            <h2 class="descriptionTitle"><i>TaskHead</i> is a simple tool to organise everything</h2>

            <p class="descriptionObjectives">
                <ul>
                    <li>"PlaceHolderImages" it will help you achieve your goals</li>
                    <li>"PlaceHolderImages" it will help your productivity</li>
                    <li>"PlaceHolderImages" it will let you save time</li>
                </ul>
            </p>

        </div>

        <div class="stats">

            <h2 class="statsTitle">Some stats :</h2>

            <p class="statsList">
                <?php
                // count number of user
                    $findNumberOfUser = $bdd->query('SELECT COUNT(username) FROM user');
                    $findNumberOfUser->execute();
                    while($fetchFindNumberOfUser = $findNumberOfUser->fetch()){
                        foreach($fetchFindNumberOfUser as $numberOfUser){
                            $numberOfUser+=1;
                        }
                    }
                ?>
                <ul>
                    <li>(<?php echo $numberOfUser?>) actif account </li>
                    <li>There is (x) todos right now waiting to be complete</li>
                    <li>(x) todos has been done</li>
                </ul>
            </p>
        </div>
    </main>
</body>
</html>