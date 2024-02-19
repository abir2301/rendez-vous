<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Patient Registration</title>
    <link rel="stylesheet" href="../stylesheet/style.css">
</head>
<body>
<div class="container">
    <h2>New Patient Registration</h2>
    <form action="../db/registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>


        <label for="password">password:</label>
        <input type="password" id="password" name="password"  required >


        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" pattern="(21|22|97|95|20|96|50)[0-9]{6}" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address">

        <input type="submit" value="Register">
    </form>
    <a href="./login.php" target="_blank">already have an account? </a>
</div>
</body>
</html>
