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
    <link rel="stylesheet" href="../css/user_connection.css">
    <title>connection - taskHead</title>
</head>
<body>
<header>
    <h1><a href="../index.php">TaskHead</a></h1>
</header>

    <div class="login">
        <h2><label for="LoginPseudo">Login</label></h2>
        <form action="../Database/User/user_login_database.php" method="post">
            <p>
                <label for="LoginPseudo">Pseudo :</label>
                <input
                    type="text"
                    id="LoginPseudo"
                    name="LoginPseudo"
                    minlength="4"
                    maxlength="12"
                    required
                    pattern="[a-zA-Z0-9]+"
                >
            </p>

            <p>
                <label for="LoginPass">Password :</label>
                <input
                    type="password"
                    id="LoginPass"
                    name="LoginPass"
                    minlength="4"
                    maxlength="255"
                    required
                >
            </p>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="register">
        <h2> <label for="RegisterPseudo">Register</label></h2>
        <form action="../Database/User/user_register_database.php" method="post">
            <p>
                <label for="RegisterPseudo">Pseudo :</label>
                <input
                    type="text"
                    id="RegisterPseudo"
                    name="RegisterPseudo"
                    minlength="4"
                    maxlength="12"
                    required
                    pattern="[a-zA-Z0-9]+"
                >
            </p>

            <p>
                <label for="RegisterPass">Password :</label>
                <input
                    type="password"
                    id="RegisterPass"
                    name="RegisterPass"
                    minlength="4"
                    maxlength="255"
                    required
                >
            </p>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="settings">
        <h2><label for="SettingsPseudo">Settings</label></h2>
        <form action="../Database/User/user_settings_database.php" method="post">
            <p>
                <label for="SettingsPseudo">Pseudo :</label>
                <input
                    type="text"
                    id="SettingsPseudo"
                    name="SettingsPseudo"
                    minlength="4"
                    maxlength="12"
                    required
                    pattern="[a-zA-Z0-9]+"
                >
            </p>

            <p>
                <label for="SettingsPass">Password :</label>
                <input
                    type="password"
                    id="SettingsPass"
                    name="SettingsPass"
                    minlength="4"
                    maxlength="255"
                    required
                >
            </p>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>