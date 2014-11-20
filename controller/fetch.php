<?php
	require 'db.php';
	$query = "SELECT * FROM friends";
	$result = mysql_query($query) or die(mysql_error());
    
    echo json_encode($result);
?>



