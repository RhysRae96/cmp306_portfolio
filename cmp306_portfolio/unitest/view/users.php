<?php 
session_start();

require_once("../view/header.php"); 
require_once("../model/connect_db.php");

if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 3)
{
     echo('You must be logged in to access this page!');
     exit();
 }
 if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 5)
{
    echo('You must be an admin to access this page!');
    exit();
}
if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 1)
{
    if(isset($_SESSION['error'])) {
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }

    if(isset($_POST['unban_user'])) {
        $user_id = $_POST['user_id'];

        // Update user data in database
        $stmt = $conn->prepare("UPDATE item SET banned = 0 WHERE id = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();

        // Redirect to users page
        echo "User unbanned successfully";
        exit();
    }

    if (isset($_POST['save_item'])) {
        $item_id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        // Update user data in database
        $stmt = $conn->prepare("UPDATE item SET name = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("siii", $name, $price, $stock, $item_id);
        $stmt->execute();

        // Redirect to users page
        echo "User status updated successfully";
        exit();
    }

    // Get number of users
    $sql_users = "SELECT COUNT(*) as count FROM users";
    $result_users = $conn->query($sql_users);
    $row_users = $result_users->fetch_assoc();
    $num_users = $row_users['count'];

     // Get number of posts
     $sql_item = "SELECT COUNT(*) as count FROM item";
     $result_item = $conn->query($sql_item);
     $row_item = $result_item->fetch_assoc();
     $num_item = $row_item['count'];

    $stmt = $conn->prepare("SELECT id, name, image, description, price, stock FROM item");   
    $stmt->execute();
    $result = $stmt->get_result();
    
    $page_number = 1; 
    $loop = 0; 
    
    ?>
    
    <!doctype html>
    <html>
    <head>
        <title>Items</title>
    </head>
    <body>
    
    <h2>Welcome, Admin!</h2>
    <p>Here are some quick stats:</p>
    <ul>
        <li>Number of Users: <?php echo $num_users; ?></li>
        <li>Number of Bikes: <?php echo $num_item; ?></li>
    </ul>
    
    <h1 align="center">ITEMS</h1> 
    
    <table border="0" align="center"> 
        <tr> 
            <th width="75">ID</th>
            <th width="255">Name</th> 
            <th width="75">Price</th>
            <th width="75">Stock</th>
            <th width="300">Actions</th>
        </tr> 
    
        <?php while ($a_row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $a_row['id']; ?></td>
                <td><?php echo $a_row['name']; ?></td>
                <td><?php echo $a_row['price']; ?></td>
                <td><?php echo $a_row['stock']; ?></td>
                <td>
                    
                    <div style="display: flex;">
                        <form method="get" action="edit_users.php">
                            <input type="hidden" name="item_id" value="<?php echo $a_row['id']; ?>">
                            <input type="submit" value="Update">
                        </form>
                        <form method="post" action="users_delete.php">
                            <input type="hidden" name="item_id" value="<?php echo $a_row['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</table>
                <?php 

            } 
            ?>
        </table> 
<?php
    //}
//else{
    exit;
//}
?>
</body>
</html>


<?php include("../view/footer.php"); ?>