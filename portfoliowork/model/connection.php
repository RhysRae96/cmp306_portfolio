<?php
function getDatabaseConnection() {
		//  Database connections 
		$servername = "lochnagar.abertay.ac.uk";
		$username = "sql2303314";
		$password = "trap bank arnold suse";
		$database = "sql2303314";
		$conn = mysqli_connect($servername,$username,$password,$database);
		// Check connection
		if (mysqli_connect_errno()) {
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
		}
		return $conn ;
		}
?>