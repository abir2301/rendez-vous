<?php
$servername = "127.0.0.1";
$username = "root";
$password = "8OtDvIZ";

// Create connection
$conn = new mysqli($servername, $username, $password, "decade");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



