<?php 
session_start();

require_once("./header.php"); 
require_once("./connect_db.php");

if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 3)
{
     echo('You must be logged in to access this page!');
     exit();
 }
 if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 5)
{
    echo('You must be logged in to access this page!');
    exit();
}
if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 1)
{
    if(isset($_SESSION['error'])) {
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }


    if (isset($_POST['ban_user'])) {
        $user_id = $_POST['user_id'];

        // Update user data in database
        $stmt = $conn->prepare("UPDATE users SET banned = 1 WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Redirect to users page
        echo "user banned successfully";
        exit();
    }

    if(isset($_POST['unban_user'])) {
        $user_id = $_POST['user_id'];

        // Update user data in database
        $stmt = $conn->prepare("UPDATE users SET banned = 0 WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Redirect to users page
        echo "User unbanned successfully";
        exit();
    }

    if (isset($_POST['save_user'])) {
        $user_id = $_POST['user_id'];
        $new_status = $_POST["status_${user_id}"];

        // Update user data in database
        $stmt = $conn->prepare("UPDATE users SET userStatus = ? WHERE id = ?");
        $stmt->bind_param("ii", $new_status, $user_id);
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
    // $sql_posts = "SELECT COUNT(*) as count FROM posts";
    // $result_posts = $conn->query($sql_posts);
    // $row_posts = $result_posts->fetch_assoc();
    // $num_posts = $row_posts['count'];

    // Get number of comments
    // $sql_comments = "SELECT COUNT(*) as count FROM comments";
    // $result_comments = $conn->query($sql_comments);
    // $row_comments = $result_comments->fetch_assoc();
    // $num_comments = $row_comments['count'];

    $stmt = $conn->prepare("SELECT id, email, userStatus, banned FROM users");   
    $stmt->execute();
    $result = $stmt->get_result();

    $page_number = 1; 
    $loop = 0; 

    ?>

    <!doctype html>
    <html>
    <head>
        <title>Users</title>
    </head>
    <body>

    <h2>Welcome, Admin!</h2>
            <p>Here are some quick stats:</p>
            <ul>
                <li>Number of Users: <?php echo $num_users; ?></li>
                <li>Number of Posts: <?php //echo $num_posts; ?></li>
                <li>Number of Comments: <?php //echo $num_comments; ?></li>
            </ul>

        <h1 align="center">USERS</h1> 

        <table border="0" align="center"> 
            <tr> 
                <th width="75">ID</th>
                <th width="255">Username</th> 
                <th width="75">Status</th>
                <th width="75">Active</th>
                <th width="300">Actions</th>
            </tr> 

            <?php while ($a_row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $a_row['id']; ?></td>
                    <td><?php echo $a_row['email']; ?></td>
                    <td id="status_<?php echo $a_row['id']; ?>"><?php echo $a_row['userStatus']; ?></td>
                    <td><?php echo ($a_row['banned'] == 0) ? '&#x2714' : '&#10060'; ?></td>
                    <td>
                        
                        <div style="display: flex;">
                            <form method="get" action="edit_users.php">
                                <input type="hidden" name="user_id" value="<?php echo $a_row['id']; ?>">
                            <input type="submit" value="Edit">
                            </form>
                            <form method="post" action="users_delete.php">
                                <input type="hidden" name="user_id" value="<?php echo $a_row['id']; ?>">
                                <input type="submit" value="Delete">
                            </form>
                            <form method="post" action="users.php">
                                <input type="hidden" name="user_id" value="<?php echo $a_row['id']; ?>">
                                <?php if ($a_row['banned'] == 1) { ?>
                                    <input type="submit" name="unban_user" value="Unban">
                                <?php } else { ?>
                                    <input type="submit" name="ban_user" value="Ban">
                                <?php } ?>
                            
                            </form>
                        </div>
                    </td>
                </tr>
                <?php 

            } 
            ?>
        </table> 
<?php
    }
else{
    exit;
}
?>
</body>
</html>


<?php include("./footer.php"); ?>