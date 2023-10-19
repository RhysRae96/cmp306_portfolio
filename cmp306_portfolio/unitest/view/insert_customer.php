<?PHP
/*
Program Name:	insert_customer.php
*/
include("../model/connect_db.php") ;

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mphone = mysqli_real_escape_string($conn, $_POST['mphone']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

// Check if passwords match
if ($password != $confirm_password) {
	die("Passwords do not match.");
}

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert user into database
$sql = "INSERT INTO users (firstname, surname, email, mphone, password_hash)
		VALUES ('$firstname', '$surname','$email', '$mphone', '$password_hash')";

if (mysqli_query($conn, $sql)) {
	header("Location: ../view/new_cust_success.php"); //Redirect
	exit();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// Message to confirm that the insert statement has been executed correctly.

// echo "Customer table insert completed, please check with PHPMyAdmin.<br>" ;
header("Location: ../view/new_cust_success.php") ;


?>
