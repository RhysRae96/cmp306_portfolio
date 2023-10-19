<?php
session_start();
require_once("../view/header.php");
require_once("../model/connect_db.php");

if(isset($_SESSION['item'])) {
    $name = $_SESSION['item'];
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';
    $new_status = $_POST["new_status"];

    // Update item data in the database
    $stmt = $conn->prepare("UPDATE item SET name = ?, price = ?, stock = ? WHERE id = ?");
    $stmt->bind_param("siii", $name, $price, $stock, $item_id);
    $stmt->execute();

    // Redirect to users page
    echo "<p>Success! Data saved for ".$name."</p>";
    exit();
}

if(isset($_POST['cancel'])) {
    // Redirect to users page
    echo("No changes have been saved!");
    exit();
}

if(isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    // Get item data from database
    $stmt = $conn->prepare("SELECT id, name, price, stock FROM item WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item_data = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form method="post" action="edit_users.php">
    <input type="hidden" name="item_id" value="<?php echo isset($item_data['id']) ? $item_data['id'] : ''; ?>">
    <input type="text" name="name" id="name" value="<?php echo isset($item_data['name']) ? $item_data['name'] : ''; ?>">
    <input type="text" name="price" id="price" value="<?php echo isset($item_data['price']) ? $item_data['price'] : ''; ?>">
    <input type="int" name="stock" id="stock" value="<?php echo isset($item_data['stock']) ? $item_data['stock'] : ''; ?>">
        <p>
            <input type="submit" name="save_item" value="Save">
            <input type="submit" name="cancel" value="Cancel">
        </p>
    </form>
</body>
</html>

<?php include("./footer.php"); ?>