<?php
include("./header.php") ; 
include("./connection.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h2>Registration Form</h2>
	<form action="registerrec.php" method="post">
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname"><br><br>
		<label for="surname">Surname:</label>
		<input type="text" id="surname" name="surname"><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>
		<label for="mphone">Mobile Number:</label>
		<input type="text" id="mphone" name="mphone"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>