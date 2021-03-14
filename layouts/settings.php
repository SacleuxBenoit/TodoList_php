<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style_settings.css">
    <title>Document</title>
</head>
<body>

<header>
    <h1>Todo List</h1>
</header>

<div class="container">

    <form action="../Database/Settings/settings_username.php" method="post">
        <label for="settingsUsername">New username :</label>
        <input type="text" name="settingsUsername" id="settingsUsername">
        <input type="submit" value="Submit">
    </form>

    <form action="../Database/Settings/settings_password.php" method="post">
        <label for="settingsPassword">New password :</label>
        <input type="password" name="settingsPassword" id="settingsPassword">
        <input type="submit" value="Submit">
    </form>

    <p><a href="../Database/Settings/settings_delete_account.php">DELETE ACCOUNT</a></p>
</div>

</body>
</html>