<?php
include('../includes/connect.php');

if(isset($_GET['del_prod'])){
    $del_id = $_GET['del_prod'];

    $del_prod = "DELETE FROM `product` WHERE prod_id=?";
    $stmt = mysqli_prepare($con, $del_prod);
    mysqli_stmt_bind_param($stmt, "i", $del_id);

    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    } else {
        echo "<script>alert('Error deleting product: " . mysqli_error($con) . "')</script>";
    }
}
?>
