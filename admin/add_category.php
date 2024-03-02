<?php
include('../includes/connect.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<main>
 <div class="table-data">
			  <div class="order">
					<div class="head">
						<h3>Insert Category</h3>
					</div>
				<form action="" method="post">
					<div class="mb-3">
                        <label for="cat_title" class="form-label"></label>
                        <input type="text" class="form-control" name="cat_title" placeholder="Enter Category title">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" name="submit_cat" value="submit"></input>
                    </div>
                </form>
            </div> 

			 <?php

                if(isset($_POST['submit_cat'])){
					$category_title = mysqli_real_escape_string($con, $_POST['cat_title']);
					$select="select * from `categories` where cat_title='$category_title'";
					$result_select=mysqli_query($con,$select);
					$number=mysqli_num_rows($result_select);
					
					if($number>0){
						echo "<script>alert('Category already present inside the database')</script>";
					}
					else{
						$insert_query="insert into `categories` (cat_title) values ('$category_title')";
					    $result=mysqli_query($con,$insert_query);
						if($result){
							echo "<script>alert('Category has been successfully inserted')</script>";
						}
					}
				}
			

			?> 
</div> 
</main>

<script src="script.js"></script>
</body>
</html>