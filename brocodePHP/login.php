<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="login.php" method="post">
        <label>Username: </label>
        <input type="text" name="username"><br>
        <label>Password: </label>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="log in">
    </form>
</body>
</html>
<?php
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username) || empty($password)) {
        echo "Username or password is missing!";
    }
    else {
        echo "Hello {$username}";
    }
}

?>