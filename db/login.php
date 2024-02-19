<?php

include 'connexion.php'; // Assuming the filename is connection.php and it's in the same directory as this file

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];
try {
    $sql = "select name   from patients where email = '$email' ";
    $result = $conn->query($sql);

    if ( $result->num_rows > 0) {
        session_start();
        $row_patient_name = $result->fetch_assoc();
        $name = $row_patient_name['name'];

        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        header("location : ../ui/home.php");
    } else {
        // Check if the error is due to duplicate email
        if ($conn->errno == 1062) { // 1062 is the error code for duplicate entry
            echo "<script>alert('Email doesn t exist  '); document.location='../ui/registration.php'</script>";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
    }
} catch (Exception $e) {

    echo "<script>alert('Email doesn t exist  '); document.location='../ui/registration.php'</script>";

}

