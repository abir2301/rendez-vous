<?php
include 'connexion.php'; // Assuming the filename is connection.php and it's in the same directory as this file

// Retrieve form data
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address =$_POST['address'];
$password = $_POST['password'];
try {
    $sql = "INSERT INTO patients (name, username, password, email, phone_number, address)
            VALUES ('$name', '$username', '$password', '$email', '$phone_number', '$address')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        echo "New record created successfully" . "<br>";
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
    } else {
        // Check if the error is due to duplicate email
        if ($conn->errno == 1062) { // 1062 is the error code for duplicate entry
            echo "<script>alert('Email is already in use '); document.location='../ui/registration.php'</script>";
        } else {
 throw new Exception("Error: " . $conn->error);
        }
    }
} catch (Exception $e) {

    echo "<script>alert('Email is already in use '); document.location='../ui/registration.php'</script>";

}



$conn->close();