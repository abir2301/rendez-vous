<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../stylesheet/style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="../../db/doctor/login.php" method="post">

        <label for="matricule">matricule:</label>
        <input type="text" id="matricule" name="matricule" required>

        <input type="submit" value="Login">
    </form>
    <a href="./registration.php" target="_blank">Don't have an account yet? </a>
</div>
</body>
</html>