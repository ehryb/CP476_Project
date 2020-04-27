<?php
session_start();
include 'functions.php';

$connection = getDB();
$data = array();

$email = $_POST["newemail"];
$uname = $_POST["newusername"];
$password = $_POST["newpassword"];
$old_username = $_SESSION['user'];

if (!empty($password)){
    //$_SESSION[''] = $uname;
    $query = "UPDATE userinfo SET Pword='$password' WHERE UserName = '$old_username';";
    echo $query;
    $result = runQuery($connection, $query);
    mysqli_free_result($result);
}

if (!empty($email)){
    //$_SESSION[''] = $uname;
    $query = "UPDATE userinfo SET Email='$email' WHERE UserName = '$old_username';";
    echo $query;

    $result = runQuery($connection, $query);
    mysqli_free_result($result);
}

if (!empty($uname)){
    //$_SESSION[''] = $uname;
    $query = "UPDATE userinfo SET UserName='$uname' WHERE UserName = '$old_username';";
    echo $query;

    $result = runQuery($connection, $query);
    mysqli_free_result($result);
    $_SESSION['user'] = $uname;
}

//$query = "INSERT INTO userinfo (UserName, FirstName, LastName, Email, Pword) VALUES ('$uname', '$fname', '$lname', '$email', '$password')";




//echo $query;

//$result = runQuery($connection, $query);


//mysqli_free_result($result);


header("Location: homepage.php");
exit();












?>
