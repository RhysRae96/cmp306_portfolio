<?php include("./header.php") ; ?>
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
						echo '<a href="#" class="btn btn-primary more-details-btn">More Details</a>';
						echo '<div class="card-details"></div>';
						echo '</div>' ;
						echo '</div>' ;
						echo '</div>' ;
					}
				?>
			</div><!-- row -->
			
			<!-- Modal More Details Information -->

			<div class="modal fade" id="item-modal" tabindex="-1" aria-labelledby="item-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="item-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="item-modal-image" src="" />
                <p id="item-modal-description"></p>
                <p id="item-modal-price"></p>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal -->

			
            
        </div><!-- container -->
        
    <!-- Bootstrap Option 1: Bootstrap Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
$(document).ready(function() {
    $(".more-details-btn").click(function() {
        //var name = $(this).parent().prev().text();
        var image = $(this).parent().prev().prev().find("img").attr("src");
        var description = $(this).parent().prev().find("p").eq(0).text();
        var price = $(this).parent().prev().find("p").eq(1).text();
        var extra_text = "This is some extra text that is only visible when the More Details button is clicked. More information is displayed here ";
        
        $("#item-modal-label").text(name);
        $("#item-modal-image").attr("src", image);
        $("#item-modal-description").text(description + " " + extra_text);
        $("#item-modal-price").text(price);
        
		$(".card-details").hide(); // Hide all card details
        $(this).parent().find(".card-details").show(); // Show the card details for the clicked item

        $("#item-modal").modal("show");
    });
});
</script>
   <?php
   include("./footer.php") ; 
   ?>