<?php
include ('./db/connexion.php');

session_start();

if (isset($_SESSION['email'])){
    $_SESSION['authenticated'] = true;
    header("location:./ui/home.php");
}
else {
    $_SESSION['authenticated'] = true;
    header("location:./ui/registration.php");
}

