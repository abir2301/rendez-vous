<?php
include('../db/home.php');
include "../db/connexion.php";
if (!isset($_SESSION['authenticated'])) {
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
    <link rel="stylesheet" href="../stylesheet/style.css">

</head>
<body>
<div class="bar">
    <div style="display: flex  ; align-items: center" >
        <img class="img_profile" src="../assets/man.png">
        <div>
            <?php
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            ?>
            <p><strong>Name:  </strong> <?php echo $name; ?></p>
            <p><strong>Email:  </strong><?php echo $email; ?></p>
        </div>
    </div>
    <div style="padding: 5px  ; flex-direction: column ; display: flex ; gap: 5px ">
        <button class="bnt-ajout"  id="btn">New Appointment</button>
        <div ><a href="../db/logout.php"><button class="bnt-ajout" id="logout">Log Out</button></a></div>

    </div>
</div>


<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close" >&times;</span>
        <h2>New Appointment Form</h2>
        <div class="form">
            <form action="../db/appointment.php" method="post" style="flex: 1">

                <label for="datetime" style="margin: 5px">Date and Time:</label>
                <input type="datetime-local" id="datetime" name="datetime" required style="margin: 10px ">

                <select id="doctor" name="doctor" required style="margin: 10px">
                    <option value="">Select Doctor</option>
                    <?php

                    $query = "SELECT id, name FROM doctors";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Submit"  class="submit-btn" style="background-color: #0056b3 ;color: white;
        padding: 8px 15px;
        border: none;
        margin: 10px ;

        border-radius: 4px;
        cursor: pointer;">
            </form>
        </div>


    </div>
</div>
<script>
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.querySelector(".bnt-ajout");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<div class="container">


    <div>
        <h3>Patient Agreements:</h3>
        <?php
                if ($result_appointments->num_rows > 0) {
            // Display appointments in a table
            echo "<table border='1'width='100%' >";
            echo "<tr><th  colspan='4'>Id</th><th colspan='4'>Date</th><th  colspan='4'>doctor</th><th  colspan='4'>State</th></tr>";
            while ($row = $result_appointments->fetch_assoc()) {
                $doctor_id = $row['doctor_id'];
                $request = "SELECT name FROM doctors WHERE id = '$doctor_id'";
                $doctor_name = $conn->query($request);
                $row_patient_name = $doctor_name->fetch_assoc();
                $doctor = $row_patient_name['name'];
                echo "<tr>";
                echo "<td  colspan='4'>" . $row['id'] . "</td>";
                echo "<td colspan='4'>" . $row['appointment_datetime'] . "</td>";
                echo "<td colspan='4'>" . $doctor . "</td>";
                echo "<td colspan='4'>" . $row['state']. "</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No appointments found.";
        }
        ?>

    </div>
</div>
</body>
</html>

