<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;

        }
        .container {
            flex: 1;
            max-width: 600px;
            height: 100%;
            margin: 20px auto;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .image-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .image-container img {
            width: 200px;
            height: 200px;
            margin: 0 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .image-container img:hover {
            transform: scale(1.1);
        }
        .navigation {
            display: flex;
            justify-content: center;
        }
        .navigation button {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .navigation button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Select Your Role</h1>
    <div class="image-container">
        <img src="../assets/medecin.png" alt="Doctor" onclick="chooseRole('doctor')">
        <img src="../assets/patient.png" alt="Patient" onclick="chooseRole('patient')">
    </div>
    <div class="navigation">
        <button id="doctorBtn" onclick="redirectTo('doctor')">Doctor</button>
        <button id="patientBtn" onclick="redirectTo('patient')">Patient</button>
    </div>
</div>

<script>
    function chooseRole(role) {
        if (role === 'doctor') {
            document.getElementById('doctorBtn').style.backgroundColor = '#45a049';
            document.getElementById('patientBtn').style.backgroundColor = '#4CAF50';
        } else {
            document.getElementById('doctorBtn').style.backgroundColor = '#4CAF50';
            document.getElementById('patientBtn').style.backgroundColor = '#45a049';
        }
    }

    function redirectTo(role) {
        if (role === 'doctor') {
            window.location.href = 'doctor/index.php';
        } else {
            window.location.href = '../index.php';
        }
    }
</script>
</body>
</html>

