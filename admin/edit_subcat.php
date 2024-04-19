<?php
include ('../includes/connect.php');
global $edit_id;

if(isset($_GET['edit_subcat'])){
    $edit_id = $_GET['edit_subcat'];

    // Fetch subcategory and its current category
    $get_data = "SELECT subcategories.*, categories.cat_title 
                  FROM `subcategories` 
                  INNER JOIN `categories` 
                  ON subcategories.cat_id = categories.cat_id 
                  WHERE subcat_id=?";
    $stmt = mysqli_prepare($con, $get_data);
    mysqli_stmt_bind_param($stmt, "i", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $subcat_title = $row['subcat_title'];
    $cat_title = $row['cat_title'];
}

// Fetch all categories for dropdown
$get_cats = "SELECT * FROM `categories`";
$result_cats = mysqli_query($con, $get_cats);

?>

<div class="container">
    <div class="text">
        Edit Subcategory
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="input-data">
                <input type="text" name="subcat_title" value="<?php echo htmlspecialchars($subcat_title); ?>" required>
                <div class="underline"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <select name="cat_id" required>
                    <?php
                    // Display categories in dropdown
                    while ($row_cat = mysqli_fetch_assoc($result_cats)) {
                        $selected = ($cat_title == $row_cat['cat_title']) ? 'selected' : '';
                        echo "<option value='{$row_cat['cat_id']}' $selected>{$row_cat['cat_title']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <input type="submit" name="edit_subcat" value="Save">
            </div>
        </div>
    </form>
</div>

</section>

<?php
if(isset($_POST['edit_subcat'])){
    $subcat_title = $_POST['subcat_title'];
    $cat_id = $_POST['cat_id'];

    if (empty($subcat_title) || empty($cat_id)) {
        echo "<script>alert('Please fill all fields and continue the process')</script>";
    }
    else{
        $update_query = "UPDATE `subcategories` SET subcat_title=?, cat_id=? WHERE subcat_id=?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "sii", $subcat_title, $cat_id, $edit_id);

        if(mysqli_stmt_execute($stmt)){
            echo "<script>alert('Subcategory updated successfully')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else {
            echo "<script>alert('Error updating Subcategory: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>

</body>
</html>
