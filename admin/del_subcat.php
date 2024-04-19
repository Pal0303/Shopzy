<?php
include('../includes/connect.php');

if(isset($_GET['del_subcat'])){
    $del_id = $_GET['del_subcat'];

    // Check if the subcategory has related products
    $check_prod = "SELECT * FROM `product` WHERE subcat_id=?";
    $stmt_check = mysqli_prepare($con, $check_prod);
    mysqli_stmt_bind_param($stmt_check, "i", $del_id);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if(mysqli_stmt_num_rows($stmt_check) > 0){
        echo "<script>
            if(confirm('Deleting this subcategory will also delete all related products. Are you sure you want to proceed?')){
                window.location.href = 'delete_subcategory.php?confirmed_del_subcat=$del_id';
            } else {
                window.location.href = 'index.php';
            }
        </script>";
    } else {
        deleteSubcategory($con, $del_id);
    }
}

if(isset($_GET['confirmed_del_subcat'])){
    $del_id = $_GET['confirmed_del_subcat'];
    deleteSubcategory($con, $del_id);
}

function deleteSubcategory($con, $del_id){
    // Delete related products first
    $del_prod = "DELETE FROM `product` WHERE subcat_id=?";
    $stmt_prod = mysqli_prepare($con, $del_prod);
    mysqli_stmt_bind_param($stmt_prod, "i", $del_id);

    if(mysqli_stmt_execute($stmt_prod)){
        // Now, delete the subcategory
        $del_subcat = "DELETE FROM `subcategories` WHERE subcat_id=?";
        $stmt_subcat = mysqli_prepare($con, $del_subcat);
        mysqli_stmt_bind_param($stmt_subcat, "i", $del_id);

        if(mysqli_stmt_execute($stmt_subcat)){
            echo "<script>alert('Subcategory and related products deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            echo "<script>alert('Error deleting Subcategory: " . mysqli_error($con) . "')</script>";
        }
    } else {
        echo "<script>alert('Error deleting related Product: " . mysqli_error($con) . "')</script>";
    }
}
?>
