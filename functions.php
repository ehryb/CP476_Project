<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and
return them. You need several functions for different questions
*/

function getDB()
{

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Connect failed: %s\n". $conn -> error);

    return $conn;


}

?>
