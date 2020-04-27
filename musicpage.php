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
    <title>Music </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="project_css.css" rel="stylesheet">
    <script src="./JS/getMusicData.js"></script>


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
        <form method="get" action="musicpage.php">
            <?php
                echo "<script type='text/javascript'>getList();</script>";
            ?>
            <select name="search_music" id="search_music">
                <option value='0'>Select Music</option>
            </select>
            <button class= "btn btn-secondary p-0 m-0" name = "submit" type="submit" id="buttons"> Search </button>
        </form>

<!-- <input id="search_input" type="text" name="first_name" placeholder="Search Music..."/>-->
    </div>

</nav>

    <div class="title">
        <h1>Music Reviews</h1>
        <img id = "title_image" src = "Images/music-note.png" alt="Logo" height = "90em">
    </div>



    <article>
        <div class="main-contents">
            <?php


                //if (!isset($_GET["search_music"])){
                //    $id = "http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=77780cb836c3d56b9f1f794ce2a4b512&artist=the+weeknd&track=can%27t+feel+my+face&format=json";

                //}
                //else{
                $search_music = "";
                if (empty($_GET["search_music"])){
                    $search_music = "method=track.getInfo&api_key=77780cb836c3d56b9f1f794ce2a4b512&artist=the+weeknd&track=can%27t+feel+my+face&format=json/0";
                }
                else{
                    $search_music = $_GET["search_music"];
                }


                //if ($search_music == '0'){
                //    $search_music = "http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=77780cb836c3d56b9f1f794ce2a4b512&artist=the+weeknd&track=can%27t+feel+my+face&format=json";
                //}


            echo "<script type='text/javascript'>runSearch('$search_music');</script>";
            ?>
            <div class="clearfix">
                <img id = "music_poster" class="img-fluid float-left pull-left mr-5" style="min-width: 20em; min-height: 40em; max-width: 30em; max-height: 60em;" src="https://lastfm.freetls.fastly.net/i/u/300x300/8a54e33c0046d4752bcf56b37adaa97c.png" alt="Italian Trulli">
                <p id = "page_title">Can't Feel My Face</p>

                <table>
                    <tr>
                        <th>
                            <h3 id="scores">Audience Score</h3>
                        </th>
                        <th>
                            <h3 id ="scores">Canada Rank</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>Score</th>
                        <th id = "lastFMrank">1</th>
                    </tr>
                </table>

                <h4 class="pt-4">Overview</h4>
                <div  class="different-lines"></div>
                <p id = "track_overview">"Can't Feel My Face" is a song released under the artist The Weeknd. The song is sung and performed by Canadian singer, Abel Tesfaye. The song was written and produced by Max Martin and Ali Payami with additional songwriting from Savan Kotecha, Abel Tesfaye (The Weeknd) and Peter Svensson. The song went number 1 in the charts of Australia (ARIA), Canada, Denmark, Iceland, New Zealand, South Africa and The US (Billboard Hot 100).
                </p>

                <div class="card border border-0">
                    <ul class="list-group list-group-flush border border-0">
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Date Created: </div>
                            <div id ="music_year" class="col-8">N/A</div>
                        </li>
                        <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Artist: </div>
                            <div id = "artist_names" class="col-8">The Weeknd</div>
                        </li>
                         <li class="list-group-item row d-flex border border-0 pl-0">
                            <div class="col-4" style="color:orange; font-size: 18px;">Album: </div>
                            <div id = "album_name" class="col-8" href="#">Beauty Behind the Madness</div>
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
                    <td> LA Times: Phenomenal album..... </td>
                </tr>
                <tr>
                    <td> New York Times: The Weeknd is demonstrating why he is the next big thing....</td>
                </tr>


            </table>

            <table id = "audience_table">

                <tr>
                    <th><h4>Audience Review</h4></th>
                </tr>

                <tr>
                    <td> User 1: Cannot stop listening to Starboy...so goood ...</td>
                </tr>


                <tr>
                    <td>User 2: Not Drake....</td>
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
