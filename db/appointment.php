<?php

session_start();
include ('connexion.php');
$email= $_SESSION['email'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $datetime = $_POST['datetime'];
    $doctor_id = $_POST['doctor'];
}
$sql_patient_id= "select id from patients where email= '$email'";
$result_patient_id = $conn->query($sql_patient_id);



    $row_patient_id = $result_patient_id->fetch_assoc();
    $patient_id = $row_patient_id['id'];
$sql = "INSERT INTO appointments (appointment_datetime, doctor_id, patient_id, state) VALUES ('$datetime', '$doctor_id','$patient_id', 'refused')";

if ($conn->query($sql) === TRUE) {
   header("location: ../ui/home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
