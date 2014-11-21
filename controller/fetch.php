<?php
//include 'functions.php';


    require_once 'db.php';

    $query = "SELECT * FROM friends";
    $result = mysql_query($query) or die(mysql_error());

    $jsonData=array();

    while ($row = mysql_fetch_assoc($result)) {
        $jsonData[] = $row;

    }
    echo json_encode($jsonData);


?>
