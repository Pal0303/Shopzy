<?php
	include('header.php');
  require_once('functions/common_func.php');
?>


<?php

global $con;
$ip = getIPAddress();  
$total=0;
$cart_query="select * from `cart` where ip_add='$ip'";
$result=mysqli_query($con,$cart_query);
$result_cout=mysqli_num_rows($result);
if($result_cout>0){

while($row=mysqli_fetch_array($result)){
  $product_id=$row['prod_id'];
  $select="select * from `product` where prod_id='$product_id'";
  $result_prod=mysqli_query($con,$select);

  while($row_prod=mysqli_fetch_array($result_prod)){
    $product_price=array($row_prod['prod_price']);
    $price_table=$row_prod['prod_price'];
    $product_title=$row_prod['prod_title'];
    $product_img1=$row_prod['prod_img1'];
    $product_value=array_sum($product_price);
    $total=$total+$product_value;

    echo "<section class='pt-3 pb-3'>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-12 col-md-12 col-12'>
          <div class='border p-3 mb-5'>
            <div class='table-box'>
              <form action='' method='post'>
              <table id='shoppingCart' class='table table-bordered table-sm table-condensed table-responsive'>
               
                <thead>
  
                  <tr style='text-align:center;'>
                    
                    <th style='width:15%'>Product Title</th> 
                    <th style='width:20%'>Product Image</th>
                    <th style='width:15%'>Quantity</th>
                    <th style='width:15%'>Total Price</th>
                    <th style='width:15%'>Remove</th>
                    <th style='width:15%'>Update</th>
                    
                  </tr>
                 
                </thead>
                <tbody>
                    <tr style='text-align:center;'>
                        <td data-th='' class='border'>
                            <h6>$product_title</h6>
                        </td>

                        <td data-th='Product Image' class='border'>
                            <img src='./admin/product_img/$product_img1' alt='' class='img-fluid d-none d-md-block rounded mb-2 shadow'>
                        </td>

                        <td>
                            <input type='text' name='qty' id='' class='form-input w-50'>
                        </td>
   
                        <td data-th='Total Price' class='border'>
                            ₹$price_table/-
                        </td>

                        <td class='border'>
                            <input type='checkbox' name='removeitem[]' style='margin-left: -80px;margin-top: 15px;' value='$product_id'><br>
                            <input class='btn btn-primary btn-md pl-4 pr-4 mr-3' style='    background-color: #be4d25;width: 132px;margin-top: -100px;margin-left: 40px;' type='submit' value='Remove' name='remove_cart'>
                        </td>

                        <td>
<div class='d-flex flex-column align-items-center'>
<div style='background-color: inherit;'>

<input class='btn btn-primary btn-md pl-4 pr-4 mr-3' style='background-color: #be4d25' type='submit' value='Update' name='update_cart'>
<span style='margin-right: 5px;'></span>


</div>

</div>
</td>


  </tr>
  </tbody>
            </table>
          </div>
		
  ";
  }
}


  if(isset($_POST['update_cart'])){
    $quantity=$_POST['qty'];
    $update_cart="update `cart` set quantity=$quantity where ip_add='$ip'";
    $result_query=mysqli_query($con,$update_cart);
    if(!$result_query) {
      die('Error executing query: ' . mysqli_error($con));
  }
    $total=$total*$quantity;
}

echo "<div class='price'>
<h5>Subtotal:</h5>
        <h3 class='subtotal'>₹$total/-</h3>
</div>
   
        
      <div class='text-right mt-3'>
      
        <a href='user/checkout.php' class='btn btn-primary btn-md pl-4 pr-4 mr-3' style='background-color: #be4d25;'>Checkout</a>
        &nbsp; 
        <a href='index.php' class='btn btn-primary btn-md pl-4 pr-4' style='background-color: #be4d25;'>Continue Shopping</a>
      </div>
      </form>        
              
        </div>
       
      </div>
    </div>
  </div>
</section>
    ";



    function remove_cart(){
      global $con;
      if(isset($_POST['remove_cart']) && isset($_POST['removeitem']) && is_array($_POST['removeitem'])){
          foreach($_POST['removeitem'] as $remove_id){
              $delete_query = "DELETE FROM `cart` WHERE prod_id=$remove_id";
              $run_delete = mysqli_query($con, $delete_query);
              if($run_delete){
                  echo "Item $remove_id removed successfully.<br>";
              } else {
                  echo "Error removing item $remove_id: " . mysqli_error($con) . "<br>";
              }
          }
          // Redirect to cart.php after items are removed
          echo "<script>window.open('cart.php','_self')</script>";
          exit();
      } else {
          echo "No items selected for removal.<br>";
      }
  }
  
    $remove_item = remove_cart(); 
    echo $remove_item;

  }
  else{
    echo "<h3><p style='text-align: center; margin: 20px; padding: 10px; color: #be4d25;'>
              The Cart is empty </p></h3>";
  }
?>
             
                

               







<?php
include('footer.php');
?>

