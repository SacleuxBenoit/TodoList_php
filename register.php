<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Register</h2>

        <form action="./Database/user_infos_database.php" method="post">
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

    <p>If you have an account <a href="login.php">click here</a></p>
</body>
</html>