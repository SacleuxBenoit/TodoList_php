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
            <input type="text" name="addTask" id="addTask">
        </p>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>