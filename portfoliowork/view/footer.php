		<!-- Page content finishes here -->
		
	  </div>

  <p style="text-align: center; color: Maroon;"><i><br/><br /><sup>&copy;</sup>website by Rhys Rae <?php echo date("Y");?></i></p>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  
  <!-- Modal script -->
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
  </script>	

</body>

</html>
