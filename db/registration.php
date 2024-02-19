<?php
include 'connexion.php'; // Assuming the filename is connection.php and it's in the same directory as this file

// Retrieve form data
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

// Prepare SQL statement
$sql = "INSERT INTO patients (name, username, email, phone_number, address) 
        VALUES ('$name', '$username', '$email', '$phone_number', '$address')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();