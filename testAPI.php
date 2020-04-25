<?php


include 'functions.php';

$conn = getDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Using TheMovieDB</title>
    <meta name="viewport" content="width=device-width">
    <script src="./JS/getAPI.js"></script>
    <!-- API version 3 documentation:
        https://developers.themoviedb.org/3/search
        https://developers.themoviedb.org/3/movies
    -->
</head>
<body>
    <h1>Using TheMovieDB.org API v3</h1>

    <div id = "output">

        <?php
            $link = "";
            $id = 419704;
            if (isset($_SERVER)){
                $link = $_SERVER['REQUEST_URI'];
                $seperate_link = explode("id=",$link);
                $index = 1;
                if (!empty($seperate_link[$index])){
                    $id = $seperate_link[$index];
                }
            }
            echo "<script type='text/javascript'>runSearch(".$id.");</script>";
            //$document.addEventListener('DOMContentLoaded', runSearch(id));
        ?>


    </div>



</body>
</html>
