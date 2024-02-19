<?php
include ("connexion.php");
 session_start();


if (isset( $_SESSION['email'])){
    $email =  $_SESSION['email'];

    $sql_patient_id= "select id from patients where email= '$email'";
    $result_patient_id = $conn->query($sql_patient_id);

    if ($result_patient_id->num_rows > 0) {
        // Fetch the patient's ID
        $row_patient_id = $result_patient_id->fetch_assoc();
        $patient_id = $row_patient_id['id'];


        // SQL query to select all appointments of the connected patient
        $sql_appointments = "SELECT * FROM appointments WHERE patient_id = '$patient_id' ";

        // Execute the SQL query
        $result_appointments = $conn->query($sql_appointments);

    } else {
        echo "Patient not found.";
    }


    $conn->close();
}
else {
     header("location: ../ui/registration.php");
}
