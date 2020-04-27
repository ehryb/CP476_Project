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
    <title>Movie_Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="project_css.css" rel="stylesheet">
    <script src="./JS/getAPI.js"></script>

</head>
<body>



<div class="container-fluid pt-3 h-100">
    <?php $username = $_SESSION['user'];  ?>

<nav class="navbar navbar-dark bg-dark">
    <img id = "mainLogo" src = "Images/Logo.png" alt="Logo" height = "50em">

    <div class="d-flex justify-content-end">
        <a class="pr-3" style ="color: white;"><?php echo $username ?> </a>
        <a class="pr-3"href="endSession.php">Log Out</a>
        <a class="pr-3" href="aboutuspage.php">About Us</a>
        <a class="pr-3" href="myaccountpage.php">My Account</a>
        <a href="homepage.php">Home</a>
        <form method="get" action="moviepage.php">
            <?php
                echo "<script type='text/javascript'>getList();</script>";
            ?>
            <select name="search_movies" id="search_movies">
                <option value='0'>Select Movie</option>
            </select>
            <button class= "btn btn-secondary p-0 m-0" name = "submit" type="submit" id="buttons"> Search </button>
        </form>
    </div>

</nav>

    <div class="title">
        <h1>Movie Reviews</h1>
        <img id = "title_image" src = "Images/popcorn.png" alt="Logo" height = "90em">
    </div>



    <article>
        <div class="main-contents">
            <?php
            $link = "";
            $id = 419704;
            if (isset($_SERVER)){
                $link = $_SERVER['REQUEST_URI'];
                $seperate_link = explode("search_movies=",$link);
                $index = 1;
                if (!empty($seperate_link[$index])){
                    $get_id = explode("&submit=",$seperate_link[$index]);
                    $id = $get_id[0];
                }
            }
            echo "<script type='text/javascript'>runSearch(".$id.");</script>";
            ?>
            <div class="clearfix">
                <img id = "movie_poster" class="img-fluid float-left pull-left mr-5" style="max-width: 30em; max-height: 60em;" src="" alt="Italian Trulli">
                <p id = "page_title"></p>
                <table>
                    <tr>
                        <th>
                            <h3 id="scores">Audience Score</h3>
                        </th>
                        <th>
                            <h3 id ="scores">Critics Score</h3>
                        </th>
                    </tr>
                    <tr style ="font-size: 16px;">
                         <?php
                        $query_user1 = "SELECT * FROM movie_reviews where movie_id = ".$id." and critic = false";
                        $result_user1= runQuery($conn, $query_user1);
                        $counter_all = 0;
                        $final_score = 0;
                        while ($row_score = mysqli_fetch_assoc($result_user1)) {
                            $score = (int)($row_score['review_score']);
                            $final_score = $final_score + $score;
                            $counter_all = $counter_all + 1;
                        }
                        if ($counter_all == 0){
                            echo "<th id='audience_score'>No current audience scores</th>";
                        }
                        else{
                            $final_score = (double)($final_score / $counter_all);
                            echo "<th id='audience_score'>".$final_score."</th>";
                        }

                        ?>

                        <th id = "critic_score"></th>
                    </tr>
                </table>

                <h4 class="pt-4">Overview</h4>
                <div class="different-lines"></div>
                <p id="overview"></p>

                <div class="card border border-0">
                    <ul class="list-group list-group-flush border border-0">
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Date Released: </div>
                            <div id="date_released" class="col-8"></div>
                        </li>
                        <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Director: </div>
                            <div id = "director" class="col-8">Director(s)</div>
                        </li>
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Cast: </div>
                            <div id="cast" class="col-8"></div>
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
                <?php
                    $query_critic = "SELECT * FROM movie_reviews where movie_id = ".$id." and critic = true";
                    $result_critic= runQuery($conn, $query_critic);
                    $counter = 0;
                    while (($row = mysqli_fetch_assoc($result_critic)) & ($counter < 4)) {
                        $review = $row['review_content'];
                        $score = $row['review_score'];
                        echo "<tr>";
                        echo "<td><strong>" .$score. "/10: </strong> " .$review. "</td>";
                        echo "</tr>";
                        $counter = $counter + 1;
                    }
                    if ($counter == 0){
                        echo "<tr>";
                        echo "<td>No Critic Reviews at this time</td>";
                        echo "</tr>";
                    }

                    ?>

            </table>

            <table id = "audience_table">

                <tr>
                    <th><h4>Audience Review</h4></th>
                </tr>

                 <?php
                    $query_user = "SELECT * FROM movie_reviews where movie_id = ".$id." and critic = false";
                    $result_user= runQuery($conn, $query_user);
                    $counter2 = 0;
                    while (($row2 = mysqli_fetch_assoc($result_user)) & ($counter2 < 4)) {
                        $review = $row2['review_content'];
                        $score = $row2['review_score'];
                        echo "<tr>";
                        echo "<td><strong>" .$score. "/10: </strong> " .$review. "</td>";
                        echo "</tr>";
                        $counter2 = $counter2 + 1;
                    }
                    if ($counter2 == 0){
                        echo "<tr>";
                        echo "<td>No User Reviews at this time</td>";
                        echo "</tr>";
                    }

                    ?>
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
