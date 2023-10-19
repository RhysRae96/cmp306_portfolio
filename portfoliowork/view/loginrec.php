<?php
include("./connection.php");
include("./header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email and password
    // Add your validation code here

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists and the password matches
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // The login is successful
            // Redirect the user to the dashboard or another page
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid email or password.";
        }
    } else {
        // User does not exist
        echo "Invalid email or password.";
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}

include("./footer.php");
?>