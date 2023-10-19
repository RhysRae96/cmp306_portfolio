<?php
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "comp306");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
