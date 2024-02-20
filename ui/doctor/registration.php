<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Doctor Registration</title>
    <link rel="stylesheet" href="../../stylesheet/style.css">
</head>
<body>
<div class="container">
    <h2>New Doctor Registration</h2>
    <form action="../../db/doctor/registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="matricule">matricule:</label>
        <input type="text" id="matricule" name="matricule" required>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">

        <input type="submit" value="Register">
    </form>
    <a href="./login.php" target="_blank">already have an account? </a>
</div>
</body>
</html>

