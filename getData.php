<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include 'functions.php';

$connection = getDB();
$data = array();


        $query = "SELECT Pword, UserName, Email From userinfo";
        // $query = "SELECT UserName, Email From userinfo";
        $result = runQuery($connection, $query);

        while ($row = mysqli_fetch_assoc($result)){
            //$data_val = array("UserName" => $row["UserName"], "Email" => $row['Email']);
            $data_val = array("UserName" => $row["UserName"], "Email" => $row['Email'], "Pword" => $row["Pword"]);
            $data[] = $data_val;
        }
        mysqli_free_result($result);



echo json_encode($data, JSON_UNESCAPED_UNICODE);




?>


