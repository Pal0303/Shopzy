<?php

include('../includes/connect.php');
require_once('index.php');

?>

<div class="container">
      <div class="text">
         Insert Product
      </div>
      <form action="#" method="post" enctype="multipart/form-data">
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="prod_title" required>
               <div class="underline"></div>
               <label for="prod_title">Enter Product title here..</label>
            </div> 

            <div class="input-data">
               <input type="text" name="prod_desc" required>
               <div class="underline"></div>
               <label for="prod_desc">Enter Product description here..</label>
            </div>  
         </div>

         <div class="form-row">
            <div class="input-data">
               <input type="text" name="prod_feat1" required>
               <div class="underline"></div>
               <label for="prod_feat1">Enter Product Feature-1 here..</label>
            </div>

            <div class="input-data">
               <input type="text" name="prod_feat2" required>
               <div class="underline"></div>
               <label for="prod_feat2">Enter Product Feature-2 here..</label>
            </div>
         </div>

         <div class="form-row">
            <div class="input-data">
               <input type="text" name="prod_feat3" required>
               <div class="underline"></div>
               <label for="prod_feat3">Enter Product Feature-3 here..</label>
            </div>

            <div class="input-data">
               <input type="text" name="prod_key" required>
               <div class="underline"></div>
               <label for="prod_key">Enter Product keywords here..</label>
            </div>
         </div>

         <div class="form-row">
         <div class="input-data">
			<div class="select">
			<select  name="subcategory" id="subcategory" required>
            <option value=''  disabled selected hidden>Select Sub-Category..</option>

			<?php

                    $select_subcategory="select * from `subcategories`";
                    $result_subcategory=mysqli_query($con,$select_subcategory);
                    while($row_data=mysqli_fetch_assoc($result_subcategory)){
                    $subcategory_title=$row_data['subcat_title'];
                    $subcategory_id=$row_data['subcat_id'];
                    echo "<option value='$subcategory_id'>$subcategory_title</option>";
                    }

			?>

            </select>
            </div>
            </div>
         </div>

        <div class="form-row">
        <div class="input-data">
            <input type="file" name="prod_img1" required></input>
            <label for="prod_img1">Product image-1</label>
        </div>

        <div class="input-data">
            <input type="file" name="prod_img2" required></input>
            <label for="prod_img2">Product image-2</label>
        </div>
        </div>

        <div class="form-row">
            <div class="input-data">
               <input type="text" name="prod_price" required>
               <div class="underline"></div>
               <label for="prod_price">Enter Product Price here..</label>
            </div>

            <div class="input-data">
               <input type="text" name="prod_dis" required>
               <div class="underline"></div>
               <label for="prod_dis">Enter Product Discount here..</label>
            </div>
         </div>

         
        
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit"  name="submit_prod" value="submit">
               </div>
            </div>
      </form>
    </div>

	</section>


    
<?php
if(isset($_POST['submit_prod'])) {

    $product_title = mysqli_real_escape_string($con, $_POST['prod_title']);
	$select="select * from `product` where prod_title='$product_title'";
	$result_select=mysqli_query($con,$select);
	$number=mysqli_num_rows($result_select);

    if($number > 0){
        echo "<script>alert('Product already present inside the database')</script>";
    }
    else{

    $product_title = isset($_POST['prod_title']) ? mysqli_real_escape_string($con, $_POST['prod_title']) : '';
    $product_description = isset($_POST['prod_desc']) ? mysqli_real_escape_string($con, $_POST['prod_desc']) : '';
    $product_keyword = isset($_POST['prod_key']) ? mysqli_real_escape_string($con, $_POST['prod_key']) : '';
    $product_subcategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : '';
    $product_feat1= isset($_POST['prod_feat1']) ? mysqli_real_escape_string($con, $_POST['prod_feat1']) : '';
    $product_feat2= isset($_POST['prod_feat2']) ? mysqli_real_escape_string($con, $_POST['prod_feat2']) : '';
    $product_feat3= isset($_POST['prod_feat3']) ? mysqli_real_escape_string($con, $_POST['prod_feat3']) : '';
    $product_price = isset($_POST['prod_price']) ? intval($_POST['prod_price']) : '';
    $product_status = 'true';
    $product_discount= isset($_POST['prod_dis']) ? mysqli_real_escape_string($con, $_POST['prod_dis']) : '';

    $product_img1 = isset($_FILES['prod_img1']['name']) ? $_FILES['prod_img1']['name'] : '';
    $product_img2 = isset($_FILES['prod_img2']['name']) ? $_FILES['prod_img2']['name'] : '';
    $tmp_img1 = isset($_FILES['prod_img1']['tmp_name']) ? $_FILES['prod_img1']['tmp_name'] : '';
    $tmp_img2 = isset($_FILES['prod_img2']['tmp_name']) ? $_FILES['prod_img2']['tmp_name'] : '';

    if($product_title === '' || $product_description === '' || $product_feat1==='' || $product_keyword === '' || $product_subcategory === '' || $product_price === '' || $product_img1 === '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        
    }
    else {
        $upload_directory = "./product_img/";
        move_uploaded_file($tmp_img1, $upload_directory . $product_img1);
        move_uploaded_file($tmp_img2, $upload_directory . $product_img2);

        $insert_prod = "INSERT INTO `product` (prod_title, prod_desc, prod_feat1, prod_feat2, prod_feat3, prod_key, subcat_id, prod_img1, prod_img2, prod_price, prod_discount, prod_date, prod_status)
                        VALUES ('$product_title', '$product_description', '$product_feat1', '$product_feat2', '$product_feat3', '$product_keyword', '$product_subcategory', '$product_img1', '$product_img2', '$product_price', $product_discount, NOW(), '$product_status' )";

        $result_query = mysqli_query($con, $insert_prod);
        if($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}

// echo $product_title;
// echo $product_description;
// echo $product_keyword;
// echo $product_feat1;
// echo $product_subcategory;
// echo $product_price;
// echo $product_img1;
// echo $product_img2;
// echo $product_discount;
}
?>

</body>
</html>

















<!-- <div class="table-data">
			<div class="order">
					<div class="head">
						<h3>Insert Product</h3>
					</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 m-auto">
                    <label for="prod_title" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="prod_title" placeholder="Enter Product title" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_desc" class="form-label">Product Description</label>
                        <input type="text" class="form-control" name="prod_desc" placeholder="Enter Product description" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_feat1" class="form-label">Product Feature-1</label>
                        <input type="text" class="form-control" name="prod_feat1" placeholder="Enter Product features" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_feat2" class="form-label">Product Feature-2</label>
                        <input type="text" class="form-control" name="prod_feat2" placeholder="Enter Product features" >
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_feat3" class="form-label">Product Feature-3</label>
                        <input type="text" class="form-control" name="prod_feat3" placeholder="Enter Product features" >
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_key" class="form-label">Porduct Keyword</label>
                        <input type="text" class="form-control" name="prod_key" placeholder="Enter Product keyword" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                    <label for="subcategory" class="form-label">Select a Sub-Category:&nbsp;</label>
                    <select name="subcategory" id="subcategory" required>
                    <?php

                    // $select_subcategory="select * from `subcategories`";
                    // $result_subcategory=mysqli_query($con,$select_subcategory);
                    // while($row_data=mysqli_fetch_assoc($result_subcategory)){
                    // $subcategory_title=$row_data['subcat_title'];
                    // $subcategory_id=$row_data['subcat_id'];
                    // echo "<option value='$subcategory_id'>$subcategory_title</option>";
                    // }

                    ?>
                    </select>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_img1" class="form-label">Product image-1</label>
                        <input type="file" name="prod_img1" class="form-control" required></input>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_img2" class="form-label">Product image-2</label>
                        <input type="file" name="prod_img2" class="form-control"></input>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_price" class="form-label">Porduct Price</label>
                        <input type="text" class="form-control" name="prod_price" placeholder="Enter Product price" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                        <label for="prod_dis" class="form-label">Product discount</label>
                        <input type="text" class="form-control" name="prod_dis" placeholder="Enter Product price discount [%]" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                         <input type="submit" name="submit_prod" class="btn btn-info">
                   </div>
                </form>
            </div> -->






<!-- </div>
</main>

<script src="script.js"></script> -->
