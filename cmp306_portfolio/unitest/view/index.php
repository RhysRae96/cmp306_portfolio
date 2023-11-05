<?php 
include("../view/header.php") ; 
session_start();
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="row">
    <!-- Display items -->
    <?php
        include("../model/api-item.php");
        $itemtxt = getAllItems();
        $item = json_decode($itemtxt);
        for ($i = 0; $i < sizeof($item); $i++) {
            echo '<div class="col-lg-4 col-md-4 col-sm-4">';
            echo '<div class="card">';
            echo '<div class="card-header">';
            echo $item[$i]->name;
            echo '</div>';
            echo '<div class="card-block">';
            echo '<img class="img-fluid" src="../image/' . $item[$i]->image . '" />';
            //echo '<p>' . $item[$i]->description . '</p>';
            echo '<p>Price &pound;' . $item[$i]->price . '</p>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<a href="#" class="btn btn-primary more-details-btn" data-name="' . $item[$i]->name . '" data-description="' . $item[$i]->description . '" data-price="' . $item[$i]->price . '" data-image="../image/' . $item[$i]->image . '">More Details</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</div><!-- row -->

<!-- Basket -->
<div class="row">
    <div class="col-lg-12">
        <h2>Your Basket</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="basketContainer">
            </tbody>
        </table>
        <button id="checkout-button" onclick="checkout()">Proceed to Checkout</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="moreDetailsModal" tabindex="-1" role="dialog" aria-labelledby="moreDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="moreDetailsModalLabel"><span id="itemName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="itemImage" class="img-fluid" src="" />
                <p id="itemPrice"></p>
                <p id="itemDescription"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="addToBasketBtn">Add to Basket</button>
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
        var itemName = $(this).data('name');
        var itemDescription = $(this).data('description');
        var itemPrice = $(this).data('price');
        var itemImage = $(this).data('image');

        $('#itemName').text(itemName);
        $('#itemDescription').text(itemDescription);
        $('#itemPrice').text('Price: £' + itemPrice);
        $('#itemImage').attr('src', itemImage);

        // Show the modal
        $('#moreDetailsModal').modal('show');
    });

    // Handle add to basket button click
    $('#addToBasketBtn').click(function() {
    // Get the item details from the modal
    var itemName = $('#itemName').text();
    var itemPrice = $('#itemPrice').text().replace('Price: £', '');

    $(document).on('click', '.delete-btn', function() {
        // Remove the corresponding row from the table
        $(this).closest('tr').remove();
    });

    // Clear the basket each time a new item is added
    $('#basketContainer').empty();

     // Create a new basket item row
     var basketItem = '<tr>' +
                '<td>' + itemName + '</td>' +
                '<td>' + itemPrice + '</td>' +
                '<td><button class="btn btn-danger delete-btn">Delete</button></td>' +
                '</tr>';

    // Add the item to the basket container
    $('#basketContainer').append(basketItem);

    // Close the modal
    $('#moreDetailsModal').modal('hide');
    });
});
</script>

<script>
  // Function to check if there are items in the basket
  function checkout() {
    // Check if the basket is empty
    if (document.getElementById("basketContainer").rows.length <= 0) {
      alert("Your basket is empty. Please add items before checking out.");
    } else {
        // Check if the user is logged in
        <?php
      if (!isset($_SESSION['user'])) {
        echo 'alert("You must be logged in to access this page!");';
        echo 'window.location.href = "login.php";'; // Redirect to the login page
      } else {
        echo 'window.location.href = "payment.php";'; // Redirect to the payment page
      }
      ?>
    }
  }
</script>
		
<?php include("./footer.php") ; ?>		
		
