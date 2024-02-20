<?php
session_start();

$_SESSION = array();
session_destroy();
header("Location: ../../ui/doctor/index.php");
exit();