<?php 
// If already logged in then no need to login.
// If 'user' session set then already logged in so let the user know

// Start session
session_start();
setcookie("userStatus", "1", time()+86400, "/");
if(isset($_SESSION['user'])) 
{
    // Session user already set, no need to login.
    include("../view/header.php") ;
    echo "<h5>Steady there, I think you are already logged in ...</h5><br />";
    echo "<p>No worries, you are already logged into this website, please continue by selecting an option from the menu.</p>";
    include("../view/footer.php") ;

} 
else 
{


    include("../view/header.php") ; 

    ?>

        <p>Welcome to the user login page, enter your details to be able to update your account.</p>

        <!-- Use this form to process a user login -->
    <form action="../view/process_login.php" method="post">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" required><br><br>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required><br><br>
          <input type="submit" value="Login">
    </form>

    <?php
    include("../view/footer.php") ; 
}

?>