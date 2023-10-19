<?php
session_start();
setcookie("userStatus", "1", time()+3600, "/");
include("../view/header.php");
include("../model/connect_db.php");
//include("./header.php");
// Login function

// Sanitize user input
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Retrieve user from database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// Set the userStatus cookie when the user logs in
setcookie('userStatus', '1', time() + 3600, '/');

// Check if the user has the required status
function auth_check() {
  if (isset($_COOKIE['userStatus']) && $_COOKIE['userStatus'] == 1) {
    // User has the required status, allow access to users.php
    include('users.php');
  } else {
    // User does not have the required status, redirect to login page
    header('Location: login.php');
  }
}

// Check if user exists and is not banned
if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);

  // Check if user is banned
  if($row['banned'] == 1){
    // User is banned
    echo "Your account has been banned. Please contact the administrator for more information.";
  } else {
    // Verify password
    if (password_verify($password, $row['password_hash'])) {
      // Login successful
      $_SESSION['user'] = $email;
      $_SESSION['userStatus'] = $row['userStatus'];
      echo "<h5>Pleased to have you back...</h5><br />";
      echo "<p>Welcome $email, you have successfully logged in.</p>";
      echo "<p>Please select an option from the site menu.</p>";
      include("../view/footer.php");
      exit();
    } else {
      // Login failed
      echo "Invalid username or password.";
    }
  }
} else {
  // Login failed
  echo "Invalid username or password.";
}

include("../view/footer.php");