<?php
//  employee03.php retrieve an item
include ("../model/connection.php") ;
$conn = getDatabaseConnection() ;
$id = 1;
$sql = "select * from item where id = '$id'" ;
echo $sql."<br/>" ;
$result = mysqli_query($conn, $sql) ;
$row = mysqli_fetch_assoc($result) ;
var_dump($row) ; // we know there is only one
mysqli_close($conn);
?>