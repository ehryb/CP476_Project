<?php
session_start();
include 'functions.php';


$_SESSION['user'] = "";

header('Location:mainpage.php');


?>
