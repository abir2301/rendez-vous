<?php
include './connexion.php';

// Check if appointment_id and new_state are set in the POST request
if (isset($_POST['appointment_id']) && isset($_POST['new_state'])) {
    // Sanitize input data
    $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
    $new_state = mysqli_real_escape_string($conn, $_POST['new_state']);

    // Update the state of the appointment in the database
    $sql = "UPDATE appointments SET state = '$new_state' WHERE id = '$appointment_id'";
    if ($conn->query($sql) === TRUE) {
        // Send a success response
        http_response_code(200);
        echo "Appointment state updated successfully";
    } else {
        // Send an error response
        http_response_code(500);
        echo "Error updating appointment state: " . $conn->error;
    }
} else {
    // Send a bad request response if parameters are missing
    http_response_code(400);
    echo "Missing parameters";
}
?>