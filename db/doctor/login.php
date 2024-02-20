<?php


include("../../db/connexion.php");

// Retrieve form data
$matricule = $_POST['matricule'];



try {
    $sql = "select name   from doctors where matricule = '$matricule' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row_doctor_name = $result->fetch_assoc();
        $name = $row_doctor_name['name'];
echo $name;
        $_SESSION['matricule'] = $matricule;
        $_SESSION['dr-name'] = $name;

        header("Location: ../../ui/doctor/home.php");
        exit();
    } else {

        if ($conn->errno == 1062) {
            echo "<script>alert('Matricule doesn t exist  '); document.location='../../ui/doctor/registration.php'</script>";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
    }
} catch (Exception $e) {

    echo "<script>alert('Matricule doesn t exist  '); document.location='../../ui/doctor/registration.php'</script>";

}

