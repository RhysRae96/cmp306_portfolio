<?php 
// Display the form if the cookie is NOT set.
//$cookie_name = "user";

//if(!isset($_COOKIE[$cookie_name])) 
//{
	include("../model/connect_db.php");
	include("../view/header.php") ; 
	?>
	
		<h5>Register as a customer</h5><br />
		<p>If you want to join us as a customer of 'the Little Theatre Company' then please complete the form below.</p>
		<!-- End of the header -->

		<form method="POST" action="insert_customer.php">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

		<label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required><br><br>

		<label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="mphone">Mobile No:</label>
        <input type="int" id="mphone" name="mphone" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="Signup">
    </form>
<?php
	include("./footer.php") ; 
?>