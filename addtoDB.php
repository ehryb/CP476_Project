<?php

include 'functions.php';

$connection = getDB();
$data = array();

$email = $_POST["email"];
$uname = $_POST["username"];

$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$password = $_POST["signuppassword"];


$query = "INSERT INTO userinfo (UserName, FirstName, LastName, Email, Pword) VALUES ('$uname', '$fname', '$lname', '$email', '$password')";

echo $query;

$result = runQuery($connection, $query);


mysqli_free_result($result);

/*
    session_start();

    if (!isset($_SESSION["userWishList"])){
        $userWishList = array();
        $_SESSION['userWishList'] = $userWishList;
    }

    else{
        $userWishList = $_SESSION["userWishList"];
    }


    $id = $_GET['id'];
    $fileName = $_GET['fileName'];
    $title = urldecode($_GET['title']);


    if (empty($id) || empty($fileName) || empty($title)){
        header("Location: view-wish-list.php");
        exit();
    }


    else{
        array_push($userWishList, array("id" => $id, "fileName" => $fileName, "title" => $title));
        $_SESSION["userWishList"] = $userWishList;

    }
*/

    header("Location: startSession.php?user=" .$uname);
    exit();


?>
