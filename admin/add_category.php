<?php
	include('../includes/connect.php');
	require_once('index.php');
?>
					
					
	<div class="container">
      <div class="text">
         Insert Category
      </div>
      <form action="#" method="post">
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="cat_title" placeholder="Insert Category title here..." required>
               <div class="underline"></div>
            </div>
            
         </div>
        
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit"  name="submit_cat" value="submit">
               </div>
            </div>
      </form>
    </div>

	</section>

</body>
</html>	

           


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



