<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="project_css.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="JS/errorChecking.js"></script>
</head>
<body>

<div class="container-fluid pt-3 h-100">
    <nav class="navbar navbar-dark bg-dark">
    <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">
    <div class="d-flex justify-content-end">
        <a class="pr-3" style="color: orange" href="mainpage.php">Log Out</a>
        <a class="pr-3" style="color: orange" href="aboutuspage.php">About Us</a>
        <a style="color: orange" href="homepage.php">Home</a>
    </div>

    </nav>

    <div class="pt-5"> </div>


        <!--    <img id = "mainPic" src = "Images/Logo.png" alt="Logo" height = "100px">-->


        <div class = "mx-auto" id = "accountInfo" align="center">


        <h3> My Account </h3>
        <img id = "accountImage" src = "Images/AccountImage.jpg" alt="Logo">

        <form action="homepage.php" method="GET" id ="change-this" action = "#">
            <h4>User Name: </h4> User Name HERE

            <h4 class="pt-2">New User Name: </h4>
            <input id= "newusername" type ="text" name="newusername">

            <h4 class="pt-2">Password: </h4> Old password Here (*******)

            <h4 class="pt-2">New Password: </h4>
            <input id= "newpassword" type ="password" name="newpassword">

            <h4 class="pt-2">Confirm Password: </h4>
            <input id= "confirmpassword" type ="password" name="confirmpassword">


            <h4 class="pt-2">Email: </h4>
            user.name@gmail.com

            <h4 class="pt-2">New Email: </h4>
            <input id= "newemail" type ="text" name="newemail">

            <div class="pt-2"></div>

            <button type="submit" id = "changeButton" value="Submit" onclick="edit_AccountCheck()">
                Submit Changes
            </button>
        </form>


    </div>


</div>

<div class = "pt-3"></div>


</body>


</html>
