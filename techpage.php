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
    <title>Tech_Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="project_css.css" rel="stylesheet">
    <script type="text/javascript" src="displayLists.js"></script>

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
        <form method="get" action="techpage.php">

            <select name="search_tech" id="search_tech">
                <option value='0'>Select Tech Product</option>
            </select>
            <button class= "btn btn-secondary p-0 m-0" name = "submit" type="submit" id="buttons"> Search </button>
        </form>
    </div>

</nav>

    <div class="title">
        <h1>Tech Reviews</h1>
        <img id = "title_image" src = "Images/tech.png" alt="Logo" height = "90em">
    </div>



    <article>
        <div class="main-contents">
            <div class="clearfix">
                <?php
                    $link = "";
                    $id = 1;
                    if (isset($_SERVER)){
                    $link = $_SERVER['REQUEST_URI'];
                    $seperate_link = explode("search_tech=",$link);
                    $index = 1;
                    if (!empty($seperate_link[$index])){
                        $get_id = explode("&submit=",$seperate_link[$index]);
                        $id = $get_id[0];
                    }
                }

                    $query_all = "SELECT * FROM tech_info WHERE tech_id = ".$id;


                    $main_results = runQuery($conn, $query_all);
                    $row = mysqli_fetch_array($main_results);
                    $name = $row["tech_name"];
                    $company = $row["tech_company"];
                    $product_type = $row["product_type"];
                    $overview = $row["tech_overview"];
                    $image = $row["tech_image"];
                    $year_released = $row["tech_year"];

            ?>
                <img class="img-fluid float-left pull-left mr-5" style="max-width: 30em; max-height: 60em;" src=<?php echo $image ?> alt="Italian Trulli">
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
                         <?php
                        $query_user1 = "SELECT * FROM tech_reviews where tech_id = ".$id." and critic = false";
                        $result_user1= runQuery($conn, $query_user1);
                        $query_user2 = "SELECT * FROM tech_reviews where tech_id = ".$id." and critic = true";
                        $result_user2= runQuery($conn, $query_user2);
                        $counter_all1 = 0;
                        $final_score1 = 0;
                        $counter_all2 = 0;
                        $final_score2 = 0;
                        while ($row_score = mysqli_fetch_assoc($result_user1)) {
                            $score = (int)($row_score['review_score']);
                            $final_score1 = $final_score1 + $score;
                            $counter_all1 = $counter_all1 + 1;
                        }
                        if ($counter_all1 == 0){
                            echo "<th id='audience_score'>No current audience scores</th>";
                        }
                        else{
                            $final_score1 = (double)($final_score1 / $counter_all1);
                            echo "<th id='audience_score'>".$final_score1."</th>";
                        }

                        while ($row_score = mysqli_fetch_assoc($result_user2)) {
                            $score = (int)($row_score['review_score']);
                            $final_score2 = $final_score2 + $score;
                            $counter_all2 = $counter_all2 + 1;
                        }
                        if ($counter_all2 == 0){
                            echo "<th id='critic_score'>No current audience scores</th>";
                        }
                        else{
                            $final_score2 = (double)($final_score2 / $counter_all2);
                            echo "<th id='audience_score'>".$final_score2."</th>";
                        }

                        ?>
                    </tr>
                </table>

                <h4 class="pt-4">Overview</h4>
                <div class="different-lines"></div>
                <p><?php echo $overview ?></p>

                <div class="card border border-0">
                    <ul class="list-group list-group-flush border border-0">
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Year Released: </div>
                            <div class="col-8"><?php echo $year_released ?></div>
                        </li>
                        <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Distributer: </div>
                            <div class="col-8"><?php echo $company ?></div>
                        </li>
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Product Type: </div>
                            <div class="col-8"><?php echo $product_type ?></div>
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
                    $query_critic = "SELECT * FROM tech_reviews where tech_id = ".$id." and critic = true";
                    $result_critic= runQuery($conn, $query_critic);
                    $counter = 0;
                    while (($row = mysqli_fetch_assoc($result_critic)) & ($counter < 4)) {
                        $review = $row['review_content'];
                        $score = $row['review_score'];
                        $review_username = $row["username"];
                        echo "<tr>";
                        echo "<td><strong>" .$score. "/10: </strong> " .$review. "<strong> [" .$review_username. "]</strong></td>";
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
                    $query_user = "SELECT * FROM tech_reviews where tech_id = ".$id." and critic = false";
                    $result_user= runQuery($conn, $query_user);
                    $counter2 = 0;
                    while (($row2 = mysqli_fetch_assoc($result_user)) & ($counter2 < 4)) {
                        $review = $row2['review_content'];
                        $score = $row2['review_score'];
                        $review_username = $row2["username"];
                        echo "<tr>";
                        echo "<td><strong>" .$score. "/10: </strong> " .$review. "<strong> [" .$review_username. "]</strong></td>";
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
                <form method="post" id ="add-this-review">
                <div class="pt-3 pl-5">
                    <h3>Add Review </h3>

                        0<input type="range" id = "user_score" name="user_score" min="0" max="10" class="slider" onchange="updateTextInput(this.value)";>10
                        <p id = "u_score"></p>
                        <script>
                            function updateTextInput(val) {
                                document.getElementById("u_score").innerHTML = "Current Score: " + val;
                            }

                        </script>
                    </div>
                    <div class= "pt-1"></div>
                    <textarea id="review_area" rows="4" cols="60" placeholder="Add Your Review Here"></textarea>
                    <h3></h3>
                    <button type="submit" id = "submitReview" name="submitReview" onclick = "clicked(event)">
                        <script>
                            function clicked(e)
                            {
                                if(!confirm('Are you sure you would like to submit this review?')){
                                    e.preventDefault();
                                }
                                else{
                                    var new_score = document.getElementById("user_score").value;
                                    if (new_score == null){
                                        e.preventDefault();
                                    }
                                    var new_review = document.getElementById("review_area").value;
                                    if (new_review == null){
                                        new_review = "";
                                    }
                                    else{
                                        new_review = encodeURIComponent(new_review);
                                    }
                                    var movie_id = "" + <?php echo $id ?>;
                                    var url = "addReview.php?type=tech&id=" + movie_id + "&review=" + new_review + "&score=" +new_score;

                                    document.getElementById("add-this-review").action = url;


                                }

                            }
                        </script>
                        Submit Review!
                    </button>
                </form>



            </div>



        </div>


    </article>




</div>

    </body>
</html>
