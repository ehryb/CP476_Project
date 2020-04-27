<?php
session_start();
include 'functions.php';
/*
Defines functions to connect to the Database, retrieve the result and
return them. You need several functions for different questions
*/
$conn = getDB();

$type;
$id;
$score;
$review = "";

if (!empty($_GET['type'])){
    $type = $_GET['type'];
}
if (!empty($_GET['id'])){
    $id = $_GET['id'];
}
if (!empty($_GET['score'])){
    $score = $_GET['score'];
}
if (!empty($_GET['review'])){
    $review = $_GET['review'];
}

// if all the queries went through we can remove from the session wish list
if (!empty($id) && !empty($score) && !empty($type)){
    $review_id  = rand(1000, 1000000);
    $username = $_SESSION['user'];

    if ($type == "movie"){

        $query_user = "INSERT INTO `movie_reviews`(`review_id`, `movie_id`, `username`, `review_score`, `review_content`, `critic`) VALUES (".$review_id.",".$id.",'".$username."',".$score.",'".$review."',false)";
        $var = runQuery($conn, $query_user);
        header("Location: moviepage.php");
        exit();
    }
    if ($type == "restaurant"){

        $query_user = "INSERT INTO `restaurant_reviews`(`review_id`, `restaurant_id`, `username`, `review_score`, `review_content`, `critic`) VALUES (".$review_id.",".$id.",'".$username."',".$score.",'".$review."',false)";
        $var = runQuery($conn, $query_user);
        header("Location: restaurantpage.php");
        exit();
    }
    if ($type == "tech"){

        $query_user = "INSERT INTO `tech_reviews`(`review_id`, `tech_id`, `username`, `review_score`, `review_content`, `critic`) VALUES (".$review_id.",".$id.",'".$username."',".$score.",'".$review."',false)";
        $var = runQuery($conn, $query_user);
        header("Location: techpage.php");
        exit();
    }

    if ($type == "art"){

        $query_user = "INSERT INTO `art_reviews`(`review_id`, `art_id`, `username`, `review_score`, `review_content`, `critic`) VALUES (".$review_id.",".$id.",'".$username."',".$score.",'".$review."',false)";
        $var = runQuery($conn, $query_user);
        header("Location: artpage.php");
        exit();
    }




}



?>
