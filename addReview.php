<?php

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

    if ($type == "movie"){
        $query_user = "INSERT INTO `movie_reviews`(`review_id`, `movie_id`, `review_score`, `review_content`, `critic`) VALUES (".$review_id.",".$id.",".$score.",'".$review."',false)";
    }


    $var = runQuery($conn, $query_user);
}

//header("Location: moviepage.php");
//exit();

?>
