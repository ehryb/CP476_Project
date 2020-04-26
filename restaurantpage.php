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
    <title>Restaurant_Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="project_css.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid pt-3 h-100">
    <nav class="navbar navbar-dark bg-dark">
    <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">
    <div class="d-flex justify-content-end">
        <a class="pr-3"href="mainpage.php">Log Out</a>
        <a class="pr-3" href="aboutuspage.php">About Us</a>
        <a class="pr-3" href="myaccountpage.php">My Account</a>
        <a href="homepage.php">Home</a>
        <form method="get" action="restaurantpage.php">

            <select name="search_restaurants" id="search_restaurants">
                <option value='0'>Select Restaurant</option>
                <?php
                    $query_list = "SELECT restaurant_id, restaurant_name from restaurant_info";


                    $list_results = runQuery($conn, $query_list);

                    while ($row_list = mysqli_fetch_assoc($list_results)) {
                        $r_id = $row_list["restaurant_id"];
                        $r_names = $row_list['restaurant_name'];
                        echo "<option value = ".$r_id.">".$r_names."</option>";
                    }

                ?>
            </select>
            <button class= "btn btn-secondary p-0 m-0" name = "submit" type="submit" id="buttons"> Search </button>
        </form>
    </div>

</nav>

    <div class="title">
        <h1>Restaurant Reviews</h1>
        <img id = "title_image" src = "Images/food.png" alt="Logo" height = "90em">
    </div>



    <article>
        <div class="main-contents">
            <div class="clearfix">
                <?php
                    $link = "";
                    $id = 1;
                    if (isset($_SERVER)){
                    $link = $_SERVER['REQUEST_URI'];
                    $seperate_link = explode("search_restaurants=",$link);
                    $index = 1;
                    if (!empty($seperate_link[$index])){
                        $get_id = explode("&submit=",$seperate_link[$index]);
                        $id = $get_id[0];
                    }
                }

                $query_all = "SELECT * FROM `restaurant_info` WHERE `restaurant_id` = ".$id;


                $main_results = runQuery($conn, $query_all);
                $row = mysqli_fetch_array($main_results);
                $name = $row["restaurant_name"];
                $location = $row["restaurant_location"];
                $cusine = $row["cusine_type"];
                $overview = $row["restaurant_overview"];
                $image = $row["restaurant_image"];
                $price_range = $row["price_range"];

            ?>
                <img class="img-fluid float-left pull-left mr-5" style="max-width: 30em; max-height: 60em;" src= <?php echo $image ?> alt="Italian Trulli">
                <p id = "page_title"><?php echo $name ?></p>
                <table>
                    <tr>
                        <th>
                            <h3 id="scores">Audience Score</h3>
                        </th>
                        <th>
                            <h3 id ="scores">Critics Score</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>Score</th>
                        <th>Score</th>
                    </tr>
                </table>

                <h4 class="pt-4">Overview</h4>
                <div class="different-lines"></div>
                <p><?php echo $overview ?></p>

                <div class="card border border-0">
                    <ul class="list-group list-group-flush border border-0">
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Price Range: </div>
                            <div class="col-8"><?php echo $price_range ?></div>
                        </li>
                        <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Location: </div>
                            <div class="col-8"><?php echo $location ?></div>
                        </li>
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Cusine Type: </div>
                            <div class="col-8"><?php echo $cusine ?></div>
                        </li>

                    </ul>
                </div>
            </div>
            </div>

        <div class="different-lines">
            <div class = "new-lines">

            </div>
        </div>


        <div id = "container2">
        <div class = "new-lines">


        <div id = "ReviewBox">
            <table id = "critic_table">
                <tr>
                    <th><h4>Critic Reviews</h4></th>
                </tr>

                <tr>
                    <td> LA Times: Great food, better atmosphere </td>
                </tr>
                <tr>
                    <td> New York Times: Something for everyone </td>
                </tr>


            </table>

            <table id = "audience_table">

                <tr>
                    <th><h4>Audience Review</h4></th>
                </tr>

                <tr>
                    <td> User 1: Not worth the hype</td>
                </tr>


                <tr>
                    <td>User 2: Excellent! Went here for my anniversary...</td>
                </tr>
            </table>


        </div>

        </div>



        </div>

        <div id = "container3">
            <div class = "new-lines">

                <div class="pt-3 pl-5">
                    <h3>Add Review </h3>

                    <textarea id="review_area" rows="4" cols="60" placeholder="Add Your Review Here"></textarea>
                    <h3></h3>
                    <button type="submit" id = "submitReview" value="reviewSubmit">
                        Submit Review!
                    </button>

                </div>

            </div>



        </div>


    </article>




</div>
    </body>
</html>
