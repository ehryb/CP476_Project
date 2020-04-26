<?php
include 'functions.php';
/*
Defines functions to connect to the Database, retrieve the result and
return them. You need several functions for different questions
*/
$conn = getDB();


$query_art = "SELECT tech_id, tech_name from tech_info";
$result_art = runQuery($conn, $query_art);

$json_array_row = array();
while ($row = mysqli_fetch_assoc($result_art)) {

    $json_array_row[] = $row;

}
$json_array = json_encode($json_array_row);


echo $json_array;

?>
