<?php
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');
?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
   	 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- local CSS -->
		<link rel="stylesheet" href="hedgetrimmer.css?v=2.0" />
		
    	<title>CMP306 - Web Services Development</title>
	</head> 
        
	<body>

	    <!-- overall container for page -->
	    <div class="container">
	    
	    	<!-- header row -->
    		<div id="header" class="card text-center">
    			<img src="../image/title01.jpg" />
    			<div class="card-img-overlay">
            		<h1 class="card-title">CMP306 Web Services Development - 2022-23</h1>
            		<h2 class="card-title">Dr Geoffrey Lund - g510572</h2>
            		<h3>This site if part of a student assessment - All images are copyright B&Q (diy.co.uk)</h3>
        		</div>
    		</div><!-- Header  row -->

            <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-danger" id="menu-toggle"> Show/Hide Menu </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
				aria-controls="navbarSupportedContent" 
				aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" style="color: black;" href="./index.php">Home <span class="sr-only"></span></a>
            </li>
			 <li class="nav-item">
              <a class="nav-link" style="color: black;" href="./register.php">Register</a>
            </li>
			 <li class="nav-item">
              <a class="nav-link" style="color: black;" href="./login.php">Login</a>
            </li>
          </ul>
        </div>
      </nav>

		</body>
	</html>