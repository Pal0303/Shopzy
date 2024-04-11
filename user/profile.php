<?php
  require_once('../functions/common_func.php');
  require_once('../includes/connect.php');
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Area</title>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    
    .sidebar {
        height: 100%;
        width: 200px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        padding-top: 20px;
    }
    
    .sidebar-profile {
        text-align: center;
        margin-bottom: 20px;
    }

    .sidebar-profile  .profile-pic {
        width: 60px; 
        height: 60px; 
        background-color: #ccc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 65px;
        font-size: 24px; 
        color: #333;
        margin-bottom: 10px; 
    }

    .sidebar-profile h3 {
        color: white;
        margin-top: 10px;
    }

    .sidebar-divider {
        width: 100%;
        height: 1px;
        background-color: #555;
        margin-bottom: 20px;
    }
    
    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    
    .sidebar li {
        padding: 15px;
        text-align: center;
    }
    
    .sidebar li a {
        color: white;
        text-decoration: none;
    }
    
    .sidebar li a:hover {
        background-color: #555;
    }
    
    .content {
        margin-left: 200px;
        padding: 20px;
    }
</style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-profile">

    <?php
$sql = "SELECT username FROM `user_table`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Display the first user's name
    $row = $result->fetch_assoc();
    $userName = $row["username"];

    // Display the profile picture (first letter of the user's name)
    echo "<div class='profile-pic'>" . strtoupper(substr($userName, 0, 1)) . "</div>";
    echo "<h3>$userName</h3>";
} else {
    echo "No users found";
}

// Close the database connection

?>

    </div>
    <div class="sidebar-divider"></div>
    <ul>
        <li><a href="profile.php?pending_order">Pending Orders</a></li>
        <li><a href="profile.php?edit_acc">Edit Account</a></li>
        <li><a href="#">My Orders</a></li>
        <li><a href="logout_user.php">Logout</a></li>
        <li><a href="#">Delete Account</a></li>
       
    </ul>
</div>



<div class="content">
    <?php
    get_orderdetail();
    $con->close();
    ?>
</div>

</body>
</html>
