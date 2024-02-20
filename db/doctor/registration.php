<?php

include '../connexion.php';

$name = $_POST['name'];
$matricule = $_POST['matricule'];
$address = $_POST['address'];

try {
    $sql = "INSERT INTO doctors (name, matricule,  address)
            VALUES ('$name', '$matricule',  '$address')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        echo "New  doctor record created successfully" . "<br>";
        $_SESSION['matricule'] = $matricule;
        $_SESSION['dr-name'] = $name;

        header("Location: ../../ui/doctor/home.php");
        exit();
    } else {

        if ($conn->errno == 1062) {
            echo "<script>alert('Matricule is already in use '); document.location='../../ui/doctor/registration.php'</script>";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
    }
} catch (Exception $e) {

    echo "<script>alert('Matricule is already in use '); document.location='../../ui/doctor/registration.php'</script>";

}


$conn->close();