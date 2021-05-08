<?php
session_start();
include('../../login_database.php');
include('../../Database/connection_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>statistics</title>
</head>
<body>
    <h1>statistics : </h1>

    <div id="stats">
        <p>number of users :</p>
        <p>number of task :</p>
        <p>number of different categories :</p>
    </div>
</body>
</html>