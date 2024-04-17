<?php
include ('../includes/connect.php');
global $edit_id;

if(isset($_GET['edit_prod'])){
    $edit_id=$_GET['edit_prod'];

    $get_data="select * from `product` where prod_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title = $row['prod_title'];
    $product_description = $row['prod_desc'];
    $product_keyword = $row['prod_key'];
    $product_feat1 = $row['prod_feat1'];
    $product_feat2 = $row['prod_feat2'];
    $product_feat3 = $row['prod_feat3'];
    $product_price = $row['prod_price'];
    $product_discount = $row['prod_discount'];
    $prod_img1=$row['prod_img1'];
    $prod_img2=$row['prod_img2'];
}

?>

<div class="container">
    <div class="text">
        Edit Product
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
        <div class="input-data">
        <input type="text" name="prod_title" value="<?php echo $product_title; ?>" required>
        <div class="underline"></div>
        </div>


            <div class="input-data">
                <input type="text" name="prod_desc" value="<?php echo $product_description ?>" required>
                <div class="underline"></div>

            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_feat1" value="<?php echo $product_feat1 ?>" required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_feat2" value="<?php echo  $product_feat2 ?>" required>
                <div class="underline"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_feat3" value="<?php echo  $product_feat3 ?>" required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_key" value="<?php echo $product_keyword ?>" required>
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
                            $subcategory_title = $row_data['subcat_title'];
                            $subcategory_id = $row_data['subcat_id'];
                            echo "<option value='$subcategory_id'>$subcategory_title</option>";
                        }

                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <span for="prod_img1">Product image-1</span><br><br>
                <input type="file" name="prod_img1" required></input>

            </div>
       
            <div class="input-data">
                <span for="prod_img2">Product image-2</span><br><br>
                <input type="file" name="prod_img2" required></input>

            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_price" value="<?php echo  $product_price ?>" required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_dis" value="<?php echo  $product_discount ?>" required>
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
if(isset($_POST['edit_prod'])){
    $prod_title = $_POST['prod_title'];
    $prod_desc = $_POST['prod_desc'];
    $prod_feat1 = $_POST['prod_feat1'];
    $prod_feat2 = $_POST['prod_feat2'];
    $prod_feat3 = $_POST['prod_feat3'];
    $prod_key = $_POST['prod_key'];
    $subcategory = $_POST['subcategory'];
    $prod_price = $_POST['prod_price'];
    $prod_dis = $_POST['prod_dis'];

    $prod_img1=$_FILES['prod_img1']['name'];
    $prod_img2=$_FILES['prod_img2']['name'];

    $tmp_img1=$_FILES['prod_img1']['tmp_name'];
    $tmp_img2=$_FILES['prod_img2']['tmp_name'];

    if (empty($prod_title) || empty($prod_desc) || empty($prod_feat1) || empty($prod_feat2) || empty($prod_feat3) || empty($prod_key) || empty($subcategory) || empty($prod_price) || empty($prod_img1) || empty($prod_img2) || empty($prod_dis)) {
        echo "<script>alert('Please fill all the available fields and continue the process')</script>";
    }
    else{
        move_uploaded_file($tmp_img1,"product_img/$prod_img1");
        move_uploaded_file($tmp_img2,"product_img/$prod_img2");

        $update_query = "UPDATE `product` SET prod_title='$prod_title', prod_desc='$prod_desc', prod_feat1='$prod_feat1', prod_feat2='$prod_feat2', prod_feat3='$prod_feat3', prod_key='$prod_key', subcat_id='$subcategory', prod_img1='$prod_img1', prod_img2='$prod_img2', prod_price='$prod_price', prod_discount='$prod_dis', prod_date=NOW() WHERE prod_id=$edit_id";
       
        $result_edit=mysqli_query($con,$update_query);
        if($result_edit){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.location.href='view_product.php'</script>";
        }
        else {
            echo "<script>alert('Error updating product: " . mysqli_error($con) . "')</script>";
        }
    }
}


?>

</body>
</html>








