<?php
session_start();
include 'functions.php';


$_SESSION['user'] = "";
$user = $_GET['user'];

$_SESSION['user'] = $user;

header('Location:homepage.php');


?>
