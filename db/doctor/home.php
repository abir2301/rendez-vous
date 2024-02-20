<?php
include("../../db/connexion.php");
session_start();


if (isset($_SESSION['matricule'])) {
    $matricule = $_SESSION['matricule'];

    $sql_doctor_id = "select id from doctors where matricule= '$matricule'";
    $result_doctor_id = $conn->query($sql_doctor_id);

    if ($result_doctor_id->num_rows > 0) {
        // Fetch the patient's ID
        $row_doctor_id = $result_doctor_id->fetch_assoc();
        $doctor_id = $row_doctor_id['id'];


        // SQL query to select all appointments of the connected patient
        $sql_appointments = "SELECT * FROM appointments WHERE doctor_id = '$doctor_id' ";

        // Execute the SQL query
        $result_appointments = $conn->query($sql_appointments);

    } else {
        echo "doctor not found.";
    }


    $conn->close();
} else {
  header("location: ../../ui/doctor/registration.php");
}
