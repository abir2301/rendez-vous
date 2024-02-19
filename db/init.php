<?php
include ('./connexion.php');
$table_doctor ='CREATE TABLE  IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule  VARCHAR(100) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255)
);';
$table_patient ='CREATE TABLE  IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100), 
    email VARCHAR(100) UNIQUE NOT NULL,
    phone_number VARCHAR(20),
    address VARCHAR(255)
);';
if ($conn->query($table_doctor) === TRUE) {
    echo "Table doctor   created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}
$table_apointment ='CREATE TABLE  IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT,
    patient_id INT,
    appointment_datetime DATETIME,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id),
    FOREIGN KEY (patient_id) REFERENCES patients(id)
);';
if ($conn->query($table_patient) === TRUE) {
    echo "Table patient  created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}
if ($conn->query($table_apointment) === TRUE) {
    echo "Table  apointment created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error."<br>";
}
