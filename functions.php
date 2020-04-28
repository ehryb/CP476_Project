<?php
include 'include/config.php';

/*
Defines functions to connect to the Database, retrieve the result and
return them. You need several functions for different questions
*/

function getDB()
{

    $db = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    if (!$db) {
        print "Error - Could not connect to MySQL";
        exit;
    }

    else if (mysqli_connect_error()){
        $output = "<p>Unable to connet to database</p>". $error;
        exit($output);
    }


    return $db;
}

function runQuery($db, $query) {


    $result = mysqli_query($db, $query);
    if (!$result){
        print "Error-query could not be executed";
        print "<p>".mysqli_error($db)."<\p>";
        exit;
    }

    if (isset($result)){
        #print "Query is empty";
        #echo "NO RESULTS";
    }

    return $result;
}


function should_round($decimal_num){
    return (preg_match('/\.[0-9]{2,}[1-9][0-9]*$/', (string)$decimal_num) > 0);
}

function round_decimal($decimal_num){
    if (should_round($decimal_num)){
        return round($decimal_num,2);
    }
    else {
        return $decimal_num;
    }

}


?>
