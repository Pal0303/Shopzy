<?php
include ('../includes/connect.php');
global $edit_id;

if(isset($_GET['edit_cat'])){
    $edit_id = $_GET['edit_cat'];

    $get_data = "SELECT * FROM `categories` WHERE cat_id=?";
    $stmt = mysqli_prepare($con, $get_data);
    mysqli_stmt_bind_param($stmt, "i", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $cat_title = $row['cat_title'];
}

?>

<div class="container">
    <div class="text">
        Edit Category
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
        <div class="input-data">
        <input type="text" name="cat_title" value="<?php echo $cat_title; ?>" required>
        <div class="underline"></div>
        </div>

        </div>



        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <input type="submit" name="edit_cat" value="Save">
            </div>
        </div>
    </form>
</div>

</section>

<?php
if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['cat_title'];

    if (empty($cat_title)) {
        echo "<script>alert('Please fill Category title and continue the process')</script>";
    }
    else{
        $update_query = "UPDATE `categories` SET cat_title=? WHERE cat_id=?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "si", $cat_title, $edit_id);

        if(mysqli_stmt_execute($stmt)){
            echo "<script>alert('Category updated successfully')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else {
            echo "<script>alert('Error updating Category: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>


</body>
</html>








