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
    <title>Login_Page</title>
    <link href="project_css.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script type="text/javascript" src="JS/loginChecker.js"></script>



</head>
<body>

<div class="container-fluid pt-3 h-100">
    <nav class="navbar navbar-dark bg-dark">
        <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">
        <div class="d-flex justify-content-end">
            <a style="color: orange" href="signuppage.php">Sign Up</a>
        </div>

    </nav>

    <div class="pt-5"></div>

    <div id = "loginArea">
        <h3> ReviewMaster Login </h3>


        <form method="post" id ="submit-this" action = "#">


        <h4>User Name: </h4>
        <input id= "username" type ="text" name="username">

        <h4>Password: </h4>
        <input id= "password" type ="password" name="password">

        <h4></h4>

        <button type="submit" id = "loginButton" value="Submit", onclick = "final_login()">
            Log In!
        </button>

        </form>

    </div>

</div>

</body>


</html>
