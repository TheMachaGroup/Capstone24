<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login_page/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to HAA</title>
</head>
<body>
    <div id="login-container">
        <div id="login">
            <img id="logo" src="img/logo.png" alt="Company Logo">
            <h1 id="title">Protection Housing Assessment</h1>

            <form action="login_page/login.php" method="POST">
                <label for="Username">Username:</label>
                <input type="text" id="Username" name="Username" placeholder="Username" required><br>
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="Password" placeholder="Password" required><br>
                <button type="submit" id="signin" class="btn">Login</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
