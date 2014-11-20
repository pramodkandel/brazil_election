<?php
$host = 'sql.mit.edu';
$username = 'pramod';
$password = 'pramod';
$db = mysql_connect($host, $username, $password) or die('Could not connect to the database: ' . mysql_error());
mysql_select_db('pramod+friends', $db);
?>
