<?php
include 'connexion.php';

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
        header("Location: ../ui/home.php");
        exit();
    } else {

        if ($conn->errno == 1062) {
            echo "<script>alert('Email is already in use '); document.location='../ui/registration.php'</script>";
        } else {
 throw new Exception("Error: " . $conn->error);
        }
    }
} catch (Exception $e) {

    echo "<script>alert('Email is already in use '); document.location='../ui/registration.php'</script>";

}



$conn->close();