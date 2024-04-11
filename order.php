<?php
  require_once('functions/common_func.php');
  require_once('includes/connect.php');

  if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
  }

  $get_ip=getIPAddress();
  $total=0;
  $cart_query="select * from `cart` where ip_add='$get_ip'";
  $result=mysqli_query($con,$cart_query);
  $inv_no=mt_rand();
  $status='pending';
  $count=mysqli_num_rows($result);
  while($row=mysqli_fetch_array($result)){
    $prod_id=$row['prod_id'];
    $select_prod="select * from `product` where prod_id=$prod_id";
    $run=mysqli_query($con,$select_prod);
    while($row_prod=mysqli_fetch_array($run)){
        $prod_price=array($row_prod['prod_price']);
        $product_value=array_sum($prod_price);
        $total=$total+$product_value;
    }
  }

  $get_cart="select * from `cart`";
  $run_cart=mysqli_query($con,$get_cart);
  $get_item=mysqli_fetch_array($run_cart);
  $quantity=$get_item['quantity'];
  if($quantity==0){
    $quantity=1;
    $subtotal=$total;
  }
  else{
    $quantity=$quantity;
    $subtotal=$total*$quantity;
  }

  $insert_order = "insert into `user_orders` (user_id, amount_due, invoice_no, total_prod, order_date, order_status) values ($user_id, $subtotal, $inv_no, $count, NOW(), '$status')";
  $result_query=mysqli_query($con,$insert_order);
  if ($result_query) {
    echo "<script>alert('Orders are submitted successfully');</script>";
    echo "<script>window.open('user/profile.php','_self')</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

$insert_pending = "insert into `pending_orders` (user_id, invoice_no, prod_id, quantity, order_status) values ($user_id, $inv_no, $prod_id, $quantity, '$status')";
$result_pending=mysqli_query($con,$insert_pending);

$empty_cart="delete from `cart` where ip_add='$get_ip'";
$result_delete=mysqli_query($con,$empty_cart);

mysqli_close($con);
?>