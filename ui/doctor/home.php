<?php

include("../../db/doctor/home.php");
include ("../../db/connexion.php");
if (!isset($_SESSION['matricule'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Screen</title>
    <link rel="stylesheet" href="../../stylesheet/style.css">

</head>
<body>
<div class="bar">
    <div style="display: flex  ; align-items: center" >
        <img class="img_profile" src="../../assets/med.png">
        <div>
            <?php
            //session_start();
            $name = $_SESSION['dr-name'];


            $matricule = $_SESSION['matricule'];

            ?>
            <p><strong>Name:  </strong> <?php echo $name; ?></p>
            <p><strong>Matricule:  </strong><?php echo $matricule; ?></p>
        </div>
    </div>
    <div style="padding: 5px  ; flex-direction: column ; display: flex ; gap: 5px ">

        <div ><a href="../../db/doctor/logout.php"><button class="bnt-ajout" id="logout">Log Out</button></a></div>

    </div>
</div>





<div class="container">


    <div>
        <h3>Doctor Agreements:</h3>
        <?php
                if ($result_appointments->num_rows > 0) {
            // Display appointments in a table
            echo "<table border='1'width='100%' >";
            echo "<tr><th  colspan='4'>Id</th><th colspan='4'>Date</th><th  colspan='4'>Patient</th><th  colspan='4'>State</th></tr>";
            while ($row = $result_appointments->fetch_assoc()) {
                $patient_id = $row['patient_id'];
                $request = "SELECT name FROM patients WHERE id = '$patient_id'";
                $patient_name = $conn->query($request);
                $row_patient_name = $patient_name->fetch_assoc();
                $patient = $row_patient_name['name'];
                echo "<tr>";
                echo "<td  colspan='4'>" . $row['id'] . "</td>";
                echo "<td colspan='4'>" . $row['appointment_datetime'] . "</td>";
                echo "<td colspan='4'>" . $patient . "</td>";
                echo "<td colspan='4' class='feedback" . $row['id'] . "'>" . $row['state'] . " <button class='accept-btn' data-appointment-id='" . $row['id'] . "' style='margin: 5px; background-color: #4CAF50'>Accept</button> <button class='refuse-btn' data-appointment-id='" . $row['id'] . "' style='margin: 5px; background-color: pink;'>Refuse</button>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No appointments found.";
        }
        ?>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('click', function(event) {
                const target = event.target;
                if (target.classList.contains('accept-btn')) {
                    const appointmentId = target.dataset.appointmentId;
                    updateAppointmentState(appointmentId, 'accepted');
                } else if (target.classList.contains('refuse-btn')) {
                    const appointmentId = target.dataset.appointmentId;
                    updateAppointmentState(appointmentId, 'refused');
                }
            });
            function updateAppointmentState(appointmentId, newState) {
                console.log(appointmentId+ newState)
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../../db/update_state.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const feedbackElement = document.querySelector('.feedback' + appointmentId);
                        if (feedbackElement) {
                            feedbackElement.innerText = newState;
                        } else {
                            console.error('Feedback element not found for appointment ID: ' + appointmentId);
                        }                    } else {
                        console.error('Error updating appointment state');
                    }
                };
                console.log('appointment_id=' + appointmentId + '&new_state=' + newState)
                xhr.send('appointment_id=' + appointmentId + '&new_state=' + newState);
            }
        });
    </script>
</div>
</body>
</html>

