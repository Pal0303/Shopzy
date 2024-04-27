<?php
include ('../includes/connect.php');
global $edit_id;

if(isset($_GET['edit_prod'])){
    $edit_id=$_GET['edit_prod'];

    $get_data="SELECT * FROM `product` WHERE prod_id=?";
    $stmt = mysqli_prepare($con, $get_data);
    mysqli_stmt_bind_param($stmt, "i", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['prod_title'];
    $product_description = $row['prod_desc'];
    $product_keyword = $row['prod_key'];
    $product_feat1 = $row['prod_feat1'];
    $product_feat2 = $row['prod_feat2'];
    $product_feat3 = $row['prod_feat3'];
    $product_price = $row['prod_price'];
    $product_discount = $row['prod_discount'];
    $prod_img1 = $row['prod_img1'];
    $prod_img2 = $row['prod_img2'];
}

?>

<div class="container">
    <div class="text">
        Edit Product
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
        <div class="input-data">
        <input type="text" name="prod_title" value="<?php echo htmlspecialchars($product_title); ?>" required>
        <div class="underline"></div>
        </div>


            <div class="input-data">
                <input type="text" name="prod_desc" value="<?php echo htmlspecialchars( $product_description); ?>" required>
                <div class="underline"></div>

            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_feat1" value="<?php echo htmlspecialchars( $product_feat1 );?>" required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_feat2" value="<?php echo htmlspecialchars( $product_feat2); ?>" required>
                <div class="underline"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_feat3" value="<?php echo htmlspecialchars(  $product_feat3); ?>" required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_key" value="<?php echo htmlspecialchars( $product_keyword );?>" required>
                <div class="underline"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <div class="select">
                    <select name="subcategory" id="subcategory" required>
                        <option value='' disabled selected hidden>Select Sub-Category..</option>

                        <?php

                        $select_subcategory = "select * from `subcategories`";
                        $result_subcategory = mysqli_query($con, $select_subcategory);

                        while ($row_data = mysqli_fetch_assoc($result_subcategory)) {
                            $selected = ($subcat_title == $row_cat['subcat_title']) ? 'selected' : '';
                            echo "<option value='{$row_data['subcat_id']}' $selected>{$row_data['subcat_title']}</option>";
                        }
                      

                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <span for="prod_img1">Product image-1</span><br><br>
                <input type="file" name="prod_img1" required>
            </div>
       
            <div class="input-data">
                <span for="prod_img2">Product image-2</span><br><br>
                <input type="file" name="prod_img2" required>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_price" value="<?php echo htmlspecialchars( $product_price); ?>" required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_dis" value="<?php echo htmlspecialchars(  $product_discount); ?>" required>
                <div class="underline"></div>
            </div>
        </div>



        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <input type="submit" name="edit_prod" value="Save">
            </div>
        </div>
    </form>
</div>

</section>
<?php


if (isset($_POST['edit_prod'])) {
    $prod_title = $_POST['prod_title'];
    $prod_desc = $_POST['prod_desc'];
    $prod_feat1 = $_POST['prod_feat1'];
    $prod_feat2 = $_POST['prod_feat2'];
    $prod_feat3 = $_POST['prod_feat3'];
    $prod_key = $_POST['prod_key'];
    $subcategory = $_POST['subcategory'];
    $prod_price = $_POST['prod_price'];
    $prod_dis = $_POST['prod_dis'];

    $prod_img1_name = $_FILES['prod_img1']['name'];
    $prod_img2_name = $_FILES['prod_img2']['name'];

    $prod_img1_tmp = $_FILES['prod_img1']['tmp_name'];
    $prod_img2_tmp = $_FILES['prod_img2']['tmp_name'];

    // Upload images
    $target_dir = "product_img/";
    $prod_img1_path = $target_dir . basename($prod_img1_name);
    $prod_img2_path = $target_dir . basename($prod_img2_name);

    if (move_uploaded_file($prod_img1_tmp, $prod_img1_path) && move_uploaded_file($prod_img2_tmp, $prod_img2_path)) {
        $update_query = "UPDATE `product` SET prod_title=?, prod_desc=?, prod_feat1=?, prod_feat2=?, prod_feat3=?, prod_key=?, subcat_id=?, prod_img1=?, prod_img2=?, prod_price=?, prod_discount=?, prod_date=NOW() WHERE prod_id=?";
        
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "sssssssssiid", $prod_title, $prod_desc, $prod_feat1, $prod_feat2, $prod_feat3, $prod_key, $subcategory, $prod_img1_name, $prod_img2_name, $prod_price, $prod_dis, $edit_id);
        
        if(mysqli_stmt_execute($stmt)){
            echo "<script>alert('Product updated successfully')</script>";
        } else {
            echo "<script>alert('Error updating product: " . mysqli_error($con) . "')</script>";
        }
    } else {
        echo "<script>alert('Failed to upload images')</script>";
    }
}

?>

</body>
</html>