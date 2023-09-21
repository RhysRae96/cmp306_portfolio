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
    		
    		<br/><!-- simple but effective way to get some space -->

            <div class="row">
                <!-- Display items -->
                <?php
                	include("../model/api-item.php") ;
					$itemtxt = getAllItems() ;
					$item = json_decode($itemtxt) ;
					for ($i=0 ; $i<sizeof($item) ; $i++) {
						echo '<div class="col-lg-4 col-md-4 col-sm-4">' ;
						echo '<div class="card">' ;
						echo '<div class="card-header">' ;
						echo $item[$i] -> name ;
						echo '</div>' ;
						echo '<div class="card-block">' ;
						echo '<img class="img-fluid" src="../image/'.$item[$i]->image.'" />' ;
						echo '<p>'.$item[$i] -> description.'</p>' ; 
						echo '<p>Price &pound;'.$item[$i] -> price.'</p>' ; 
						echo '</div>' ;
						echo '<div class="card-footer">' ;
						echo '<a href="#" class="btn btn-primary">More Details</a>' ;
						echo '</div>' ;
						echo '</div>' ;
						echo '</div>' ;
					}
				?>
			</div><!-- row -->
            
        </div><!-- container -->
        
    <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>
   