<?php 
include("../view/header.php") ; 
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

            <!-- Modal -->
<div class="modal fade" id="moreDetailsModal" tabindex="-1" role="dialog" aria-labelledby="moreDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="moreDetailsModalLabel">More Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your dynamic content here -->
        <!-- For example, you can display the bigger image and more details of the selected item -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('.more-details-btn').click(function() {
      // Get the item details and populate the modal
      var itemDetails = $(this).closest('.card-footer').find('.card-details').html();
      $('.modal-body').html(itemDetails);
      
      // Show the modal
      $('#moreDetailsModal').modal('show');
    });
  });
</script>
		
<?php include("./footer.php") ; ?>		
		
