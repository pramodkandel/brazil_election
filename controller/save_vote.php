<?php

    require_once 'db.php';

    $voted_candidate = $_POST['voted_candidate'];

    $candidate_num = $_POST['candidate_num'];
    $race = $_POST['race'];
    $voter_input = $_POST['voter_input'];

    $voted_candidate = $voted_candidate === 'true'? true: false;

    if ($voted_candidate){

	$query = "UPDATE `candidates` SET `VoteCount` = `VoteCount`+1 WHERE `CandidateNumber`='$candidate_num'";
	
    }else{
	$query = "INSERT INTO `voter_inputs` (`Race`, `Input`) VALUES ('$race', '$voter_input')";
    };

    $result = mysql_query($query) or die(mysql_error());

    echo $result;
?>
