<?php
include('../includes/connect.php');
require_once('index.php');
?>

<div class="container">
      <div class="text">
         Insert Sub-Category
      </div>
      <form action="#" method="post">
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="subcat_title" required>
               <div class="underline"></div>
               <label for="subcat_title">Insert Sub-Category title here..</label>
            </div>
            
         </div>

		<div class="form-row">
            <div class="input-data">
			<div class="select">
			<select  name="category" id="category">

			<?php

                $select_category="select * from `categories`";
				$result_category=mysqli_query($con,$select_category);
				while($row_data=mysqli_fetch_assoc($result_category)){
				$category_title=$row_data['cat_title'];
				$category_id=$row_data['cat_id'];
				echo "<option value=''  disabled selected hidden>Select Category..</option>
				<option value='$category_id'>$category_title</option>";
				}

			?>

            </select>
            </div>
            </div>
        </div>
        
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit"  name="submit_subcat" value="submit">
               </div>
            </div>
      </form>
    </div>

	</section>

</body>
</html>	















<!-- <main>
<div class="table-data">
			<div class="order">
					<div class="head">
						<h3>Insert Sub-Category</h3>
					</div>
				<form action="" method="post">
                <label for="category">Select Category:</label>
                <select name="category" id="category">
                <?php

                    // $select_category="select * from `categories`";
                    // $result_category=mysqli_query($con,$select_category);
                    // while($row_data=mysqli_fetch_assoc($result_category)){
                    // $category_title=$row_data['cat_title'];
                    // $category_id=$row_data['cat_id'];
                    // echo "<option value='$category_id'>$category_title</option>";
                    // }

                ?>
       
                </select>
					<div class="mb-3">
                        <label for="subcat_title" class="form-label"></label>
                        <input type="text" class="form-control" name="subcat_title" placeholder="Enter Sub-Category title">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" name="submit_subcat" value="submit"></input>
                    </div>
                </form>
            </div> -->

			<?php
                if(isset($_POST['submit_subcat'])){
                    $category_id = $_POST['category'];
					$subcategory_title = mysqli_real_escape_string($con, $_POST['subcat_title']);
					$select="select * from `subcategories` where subcat_title='$subcategory_title'";
					$result_select=mysqli_query($con,$select);
					$number=mysqli_num_rows($result_select);
					
					if($number>0){
						echo "<script>alert('Sub-Category already present inside the database')</script>";
					}
					else{
						$insert_query="insert into `subcategories` (subcat_title,cat_id) values ('$subcategory_title','$category_id')";
					    $result=mysqli_query($con,$insert_query);
						if($result){
							echo "<script>alert('Sub-Category has been successfully inserted')</script>";
						}
					}
				}
			

			?>
