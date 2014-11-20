<html>
    <head>
    </head>
		<body>
			<form class="form" action = "index.php" method="post">
				<input name="submit" type="submit" value="My Friends"/>
			</form>
			<div id='friends'>
<?php
if(isset($_POST['submit'])){
	require 'db.php';
	$query = "SELECT * FROM friends";
	$result = mysql_query($query) or die(mysql_error());
	echo "<p> My Friends are: </p>";
	while($row = mysql_fetch_array($result)){
		echo $row['FirstName']. " ". $row['LastName']."</br>" ;
	}
}
?>			

			</div>
    </body>
    
</html>



