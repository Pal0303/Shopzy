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
  
                  <tr>
                    
                    <th style='width:20%'>Product Title</th> 
                    <th style='width:20%'>Product Image</th>
                    <th style='width:20%'>Quantity</th>
                    <th style='width:20%'>Total Price</th>
                    <th style='width:20%'>Remove</th>
                    <th style='width:20%'>Operations</th>
                    
                  </tr>
                 
                </thead>
                <tbody>
    <tr>
    <td data-th='' class='border'>
      <h5>$product_title</h5>
    </td>
    <td data-th='Product Image' class='border'>
      <img src='./admin/product_img/$product_img1' alt='' class='img-fluid d-none d-md-block rounded mb-2 shadow'>
    </td>
    <td><input type='text' name='qty' id='' class='form-input w-50'></td>
   
    <td data-th='Total Price' class='border'>₹$price_table/-</td>
    <td class='border'>
    <input type='checkbox' name='removeitem[]' value=$product_id>

</td>



<td>
<div class='d-flex flex-column align-items-center'>
<div style='background-color: inherit;'>

<input class='btn btn-primary btn-md pl-4 pr-4 mr-3' style='background-color: #be4d25' type='submit' value='Update' name='update_cart'>
<span style='margin-right: 5px;'></span>
<input class='btn btn-primary btn-md pl-4 pr-4 mr-3' style='background-color: #be4d25' type='submit' value='Remove' name='remove_cart'>

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
        <a href='#' class='btn btn-primary btn-md pl-4 pr-4 mr-3' style='background-color: #be4d25;'>Checkout</a>
        &nbsp; 
        <a href='#' class='btn btn-primary btn-md pl-4 pr-4' style='background-color: #be4d25;'>Continue Shopping</a>
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
      if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
          echo $remove_id;
          $delete_query="delete from `cart` where prod_id=$remove_id";
          $run_delete=mysqli_query($con,$delete_query);
          if($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo $remove_item=remove_cart();

  }
  else{
    echo "<h3><p style='text-align: center; margin: 20px; padding: 10px; color: #be4d25;'>
              The Cart is empty </p></h3>";
  }
?>
             
                

               







<?php
include('footer.php');
?>

