<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist</title>
</head>
<body>
    <header>
        <h1>TaskHead</h1>

        <a href="layouts/user_connection.php">login / register</a>
    </header>

    <main>
        <div class="descriptionOfTodolist">

            <h2 class="descriptionTitle">"PlaceHolderName" is a simple tool to organise everything</h2>

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
                <ul>
                    <li>(x) actif account </li>
                    <li>There is (x) todos right now waiting to be complete</li>
                    <li>(x) todos has been done</li>
                </ul>
            </p>
        </div>
    </main>
</body>
</html>