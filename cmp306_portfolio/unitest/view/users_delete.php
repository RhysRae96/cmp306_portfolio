<?php
include("../model/connect_db.php");

if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    // Delete the user from the database
    $stmt = $conn->prepare("DELETE FROM item WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();

    // Redirect back to the users page
    header("Location: users.php");
    alert("Item has been deleted");
    exit();
} else {
    // If no user ID was provided, redirect back to the users page
    header("Location: users.php");
    exit();
}
?>