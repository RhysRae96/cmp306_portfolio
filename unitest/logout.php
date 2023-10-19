<?php

// Start session
session_start();

if(!isset($_SESSION['user'])) {
    // Session user not set, ask user to login.
    include("./header.php");
    echo "<h5>Whoah, you need to login first if you want to logout ...</h5><br />";
    echo "<p>You are not currently logged in.</p>";
    echo "<p>Select the 'Login' option from the 'Site Menu' or click <a href=\"./login.php\">here</a>.</p." ;
    include("./footer.php");

} else {

    // Unset the user session (effects the user logout)
    if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
    }

    include("./header.php");
    echo "<h5>Bye for now  ...</h5><br />" ;

    echo "<p>You have successfully logged out of the system.</p>" ;

    include("./footer.php") ;
}
?>