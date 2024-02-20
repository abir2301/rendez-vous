<?php

include('../../db/connexion.php');

//session_start();
//echo'doctor home';
//echo $_SESSION['matricule'];
if (isset($_SESSION['matricule'])) {
    header("Location: home.php");
} else {

    header("Location: registration.php");
}
