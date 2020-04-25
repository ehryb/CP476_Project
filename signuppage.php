<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="project_css.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="JS/errorChecking.js"></script>

</head>
<body >

<div class="container-fluid pt-3 h-100">
    <nav>
        <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">
    </nav>

    <div class="pt-5"> </div>


    <div id = "loginArea">
        <h3> ReviewMaster Sign Up </h3>

        <form action="homepage.html" method="GET" id ="submit-this" action = "#">

        <h4>First Name: </h4>
        <input id= "firstname" type ="text" name="firstname">

        <h4>Last Name: </h4>
        <input id= "lastname" type ="text" name="lastname">

        <h4>User Name: </h4>
        <input id= "username" type ="text" name="username">



        <h4>Email: </h4>
        <input id= "email" type ="text" name="email">

        <h4>Password: </h4>
        <input id= "signuppassword" type ="password" name="signuppassword">

        <h4>Confirm Password: </h4>
        <input id= "signupconfirm" type ="password" name="signupconfirm">

        <h4></h4>



        <button type="submit" id = "signUpButton" value="submit" onclick="final_check()">
            Sign Up!
        </button>
        </form>

    </div>

</div>

</body>


</html>