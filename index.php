<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_index.css">
    <title>Document</title>
</head>
<body>
<header>
    <h1>Todo List</h1>
</header>
    <div class="login">
        <h2>Login</h2>

        <form action="./Database/User/user_login_database.php" method="post">
            <p>
                <label for="LoginEmail">Email :</label>
                <input type="email" id="LoginEmail" name="LoginEmail">
            </p>

            <p>
                <label for="LoginPass">Password :</label>
                <input type="password" id="LoginPass" name="LoginPass">
            </p>

            <input type="submit" value="Submit">
            
        </form>
    </div>

    <div class="register">
        <h2>Register</h2>

        <form action="./Database/User/user_infos_database.php" method="post">
            <p>
                <label for="RegisterEmail">Email :</label>
                <input type="email" id="RegisterEmail" name="RegisterEmail">
            </p>

            <p>
                <label for="RegisterPass">Password :</label>
                <input type="password" id="RegisterPass" name="RegisterPass">
            </p>

            <input type="submit" value="Submit">
            
        </form>
    </div>
</body>
</html>