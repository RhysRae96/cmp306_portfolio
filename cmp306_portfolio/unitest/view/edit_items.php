<?php
session_start();
require_once("./header.php");
include("../model/connect_db.php");

$username = $_SESSION['user'];
if(isset($_POST['save_item'])) {
    $item_id = $_POST['item_id'];
    $new_name = $_POST['new_name'];
    $new_image = $_POST['new_image'];
    $new_description = $_POST['new_description'];
    $new_price = $_POST['new_price'];
    $new_stock = $_POST['new_stock'];

    // Update item data in the database
    $stmt = $conn->prepare("UPDATE item SET name = ?, image = ?, description = ?, price = ?, stock = ? WHERE id = ?");
    $stmt->bind_param("sssiii", $new_name, $new_image, $new_description, $new_price, $new_stock, $item_id);
    $stmt->execute();

    // Redirect to items page
    echo "<p>Success! Data saved by ".$username."</p>";
    exit();
}

if(isset($_POST['cancel'])) {
    // Redirect to items page
    echo("No changes have been saved!");
    exit();
}

if(isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    // Get item data from the database
    $stmt = $conn->prepare("SELECT id, name, image, description, price, stock FROM item WHERE id = ?");
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
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>

    <form method="post" action="edit_items.php">
        <input type="hidden" name="item_id" value="<?php echo $item_data['id']; ?>">
        <p>
            <label for="new_name">Name:</label>
            <input type="text" name="new_name" id="new_name" value="<?php echo $item_data['name']; ?>">
        </p>
        <p>
            <label for="new_image">Image:</label>
            <input type="text" name="new_image" id="new_image" value="<?php echo $item_data['image']; ?>">
        </p>
        <p>
            <label for="new_description">Description:</label>
            <textarea name="new_description" id="new_description"><?php echo $item_data['description']; ?></textarea>
        </p>
        <p>
            <label for="new_price">Price:</label>
            <input type="number" name="new_price" id="new_price" value="<?php echo $item_data['price']; ?>">
        </p>
        <p>
            <label for="new_stock">Stock:</label>
            <input type="number" name="new_stock" id="new_stock" value="<?php echo $item_data['stock']; ?>">
        </p>
        <p>
            <input type="submit" name="save_item" value="Save">
            <input type="submit" name="cancel" value="Cancel">
        </p>
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();

include("./footer.php");
?>