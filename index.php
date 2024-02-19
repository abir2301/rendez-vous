<?php
echo "abir";
include ('./db/connexion.php');

session_start();

if (isset($_SESSION['email'])){
    header("location:./ui/home.php");
}
else {
    header("location:./ui/registration.php");

}
