<?php

	include("connection.php");
	$conn =  getDatabaseConnection();
		
	//  function to create an user
	function createUser($txt) {
		global $conn ;
		$user = json_decode($txt) ;
		$stmt = $conn->prepare("insert into user (firstname, surname, email, mphone, password) values (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $firstname, $surname, $email, $mphone, $password);
        $firstname = $user -> firstname ;
		$surname = $user -> surname ;  
		$email = $user -> email ;
		$mphone = $user -> mphone ; 
		$password = $user -> password ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	//  function to get all the users
	function getAllUsers()
	{
		global $conn ;
		$sql = "SELECT * FROM user LIMIT 10";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	
	//  function to get a single user
	function getUserById($eno)
	{
		global $conn ;
		$stmt = mysqli_stmt_init($conn);
		$sql = "SELECT * FROM user WHERE uid= ? LIMIT 1" ;
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $uid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result) ;  //there is only 1 row
		return json_encode($row);
	}

	
?>