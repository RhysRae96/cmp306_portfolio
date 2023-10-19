<?php
//  user.php - create a new user using JSON-RPC
error_reporting(E_ALL);

//  set up the data to be inserted
$user = new stdClass() ;
$user -> firstname = "Rhys";
$user -> surname = "Rae";
$user -> email = "rrae@gmail.com";
$user -> mphone = "07791964748" ;
$user -> password = "123" ;

//  set up the request
$request = new stdClass();
$request -> jsonrpc = "2.0" ;
$request -> method = "createUser" ;
$request -> params = $user ;
$request -> id = "2303314" ;
$txt = json_encode($request) ;
echo $txt.'<br/><br/>' ;

//  set up for the curl
// $url = "localhost/mayar.abertay.ac.uk/cmp306/jsonrpc/index.php" ;
$url = "https://mayar.abertay.ac.uk/~2303314/cmp306/coursework/portfoliowork/model/index.php" ;;
$ch = curl_init($url) ;
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
$headers = array (
	'Content-Type: application/json', 
	'Content-Length: ' . strlen($txt) ) ;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers) ;
curl_setopt($ch, CURLOPT_POSTFIELDS, $txt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch) ;

//  display the result of the call
echo $response ;	
?>
