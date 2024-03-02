<?php

include('../includes/connect.php');

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<main>
<div class="table-data">
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
                        <label for="prod_key" class="form-label">Porduct Keyword</label>
                        <input type="text" class="form-control" name="prod_key" placeholder="Enter Product keyword" required>
                    </div>

                    <div class="form-outline mb-4 m-auto">
                    <label for="subcategory" class="form-label">Select a Sub-Category:&nbsp;</label>
                    <select name="subcategory" id="subcategory" required>
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
                         <input type="submit" name="submit_prod" class="btn btn-info">
                   </div>
                </form>
            </div>

    
<?php
if(isset($_POST['submit_prod'])) {
    $product_title = isset($_POST['prod_title']) ? mysqli_real_escape_string($con, $_POST['prod_title']) : '';
    $product_description = isset($_POST['prod_desc']) ? mysqli_real_escape_string($con, $_POST['prod_desc']) : '';
    $product_keyword = isset($_POST['prod_key']) ? mysqli_real_escape_string($con, $_POST['prod_key']) : '';
    $product_subcategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : '';
    $product_price = isset($_POST['prod_price']) ? intval($_POST['prod_price']) : '';
    $product_status = 'true';

    $product_img1 = isset($_FILES['prod_img1']['name']) ? $_FILES['prod_img1']['name'] : '';
    $product_img2 = isset($_FILES['prod_img2']['name']) ? $_FILES['prod_img2']['name'] : '';
    $tmp_img1 = isset($_FILES['prod_img1']['tmp_name']) ? $_FILES['prod_img1']['tmp_name'] : '';
    $tmp_img2 = isset($_FILES['prod_img2']['tmp_name']) ? $_FILES['prod_img2']['tmp_name'] : '';

    if($product_title === '' || $product_description === '' || $product_keyword === '' || $product_subcategory === '' || $product_price === '' || $product_img1 === '' || $product_price === 0) {
        echo "<script>alert('Please fill all the available fields')</script>";
        
    }
    else {
        $upload_directory = "./product_img/";
        move_uploaded_file($tmp_img1, $upload_directory . $product_img1);
        move_uploaded_file($tmp_img2, $upload_directory . $product_img2);

        $insert_prod = "INSERT INTO `product` (prod_title, prod_desc, prod_key, subcat_id, prod_img1, prod_img2, prod_price, prod_date, prod_status)
                        VALUES ('$product_title', '$product_description', '$product_keyword', '$product_subcategory', '$product_img1', '$product_img2', '$product_price', NOW(), '$product_status' )";

        $result_query = mysqli_query($con, $insert_prod);
        if($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}
?>




</div>
</main>

<script src="script.js"></script>
</body>
</html>