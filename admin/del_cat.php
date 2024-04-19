<?php
include('../includes/connect.php');

if(isset($_GET['del_cat'])){
    $del_id = $_GET['del_cat'];

    // Check if the category has related subcategories
    $check_subcat = "SELECT * FROM `subcategories` WHERE cat_id=?";
    $stmt_check = mysqli_prepare($con, $check_subcat);
    mysqli_stmt_bind_param($stmt_check, "i", $del_id);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if(mysqli_stmt_num_rows($stmt_check) > 0){
        echo "<script>
            if(confirm('Deleting this category will also delete all related subcategories and products. Are you sure you want to proceed?')){
                window.location.href = 'delete_category.php?confirmed_del_cat=$del_id';
            } else {
                window.location.href = 'index.php';
            }
        </script>";
    } else {
        deleteCategory($con, $del_id);
    }
}

if(isset($_GET['confirmed_del_cat'])){
    $del_id = $_GET['confirmed_del_cat'];
    deleteCategory($con, $del_id);
}

function deleteCategory($con, $del_id){
    // Delete related subcategories first
    $del_subcat = "DELETE FROM `subcategories` WHERE cat_id=?";
    $stmt_subcat = mysqli_prepare($con, $del_subcat);
    mysqli_stmt_bind_param($stmt_subcat, "i", $del_id);

    if(mysqli_stmt_execute($stmt_subcat)){
        // Now, delete the category
        $del_cat = "DELETE FROM `categories` WHERE cat_id=?";
        $stmt_cat = mysqli_prepare($con, $del_cat);
        mysqli_stmt_bind_param($stmt_cat, "i", $del_id);

        if(mysqli_stmt_execute($stmt_cat)){
            echo "<script>alert('Category and related subcategories deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            echo "<script>alert('Error deleting Category: " . mysqli_error($con) . "')</script>";
        }
    } else {
        echo "<script>alert('Error deleting related subcategories: " . mysqli_error($con) . "')</script>";
    }
}
?>
