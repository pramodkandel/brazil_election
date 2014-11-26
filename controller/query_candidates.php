<?php

    require_once 'db.php';

    $race = $_POST['Race'];
    $input = $_POST['VoterInput'];
    $query = "SELECT * FROM `candidates` WHERE `Race` = '$race' AND `CandidateNumber` LIKE '{$input}%'";

    $result = mysql_query($query) or die(mysql_error());

    $returnData = array();

    while ($row = mysql_fetch_assoc($result)){
        $returnData[] = $row;
    }
    echo json_encode($returnData);
?>
