<?php
session_start();

//Unset User Session Variable
unset($_SESSION['id']);
//session_destroy();

//Readirect to Homepage
header('location: index.php');
?>