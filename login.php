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
        <h2>Login</h2>

        <form action="./Database/user_login_database.php" method="post">
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
</body>
</html>