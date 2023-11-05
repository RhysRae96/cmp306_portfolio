<?php
include("./header.php");

// Set up the JSON first
$data -> vendor = "2303314" ; // student number
$data -> transaction = "gl123456" ; // string of length 8
$data -> amount = "10.21" ; // amount less than 100
$data -> card = "4929123423453456" ; // 16 digit number

$request = json_encode($data) ;

// echo $request ;

$url = "https://mayar.abertay.ac.uk/~g510572/aberpay/v3/" ;
$ch = curl_init() ;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($request)) );
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

echo $response ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
include("./footer.php"); 
?>