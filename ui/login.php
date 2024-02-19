<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../stylesheet/style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="../db/login.php" method="post">
        <label for="Email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
    <a href="./registration.php" target="_blank">doesn't have an account ?   </a>
</div>
</body>
</html>