<?php

include 'functions.php';

//your code for connecting to database, etc. goese here
$conn = getDB();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="project_css.css" rel="stylesheet">

</head>
<body style = "margin: 0em;">

<div class="container-fluid pt-3 h-100" style="background-image: url('Images/gray-textured.jpg');" >


<nav class="navbar navbar-dark bg-dark">
    <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">
    <div class="d-flex justify-content-end">
        <a class="pr-3" href="mainpage.php">Log Out</a>
        <a class="pr-3" href="aboutuspage.php">About Us</a>
        <a href="myaccountpage.php">My Account</a>
    </div>

</nav>



<nav class= "navbar" style="background-color: transparent;">
    <img class = "img-fluid mx-auto" id = "mainPic" style="max-height: 20em;" src = "Images/Logo.png" alt="Logo" >
</nav>


<div id ="mainBars" class="card" style="background-color: transparent;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item row d-flex" style="background-color: transparent;">
            <a href = "moviepage.php">Movies</a></li>
        <li class="list-group-item row d-flex" style="background-color: transparent;">
            <a href = "musicpage.php">Music</a></li>
        <li class="list-group-item row d-flex" style="background-color: transparent;">
            <a href = "artpage.php">Art </a></li>
        <li class="list-group-item row d-flex" style="background-color: transparent;">
            <a href = "restaurantpage.php">Restaurants</a></li>
        <li class="list-group-item row d-flex" style="background-color: transparent;">
            <a href = "techpage.php">Tech</a></li>
    </ul>
</div>



<div style = "padding-top: 20px"></div>

    </div>
</body>


</html>
