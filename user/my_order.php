<style>
  .table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
  }

  .table thead th {
    background-color: #333;
    color: white;
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
  }

  .table tbody tr {
    border: 1px solid #ddd;
  }

  .table tbody td {
    padding: 10px;
    border: 1px solid #ddd;
  }
  a{
    color:#333;
    text-decoration: underline;
  }
</style>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Amount Due</th>
      <th scope="col">Total Product</th>
      <th scope="col">Invoice Number</th>
      <th scope="col">Date</th>
      <th scope="col">Complete/Incomplete</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

<?php

require_once('../includes/connect.php');
$user_name = $_SESSION['email'];
$get_user = "SELECT * FROM `user_table` WHERE user_email='$user_name'";
$result=mysqli_query($con,$get_user);
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];

$get_order="select * from `user_orders` where user_id=$user_id";
$result_order=mysqli_query($con,$get_order);
while($row_order=mysqli_fetch_assoc($result_order)){
    $order_id=$row_order['oder_id'];
    $amt=$row_order['amount_due'];
    $total_prod=$row_order['total_prod'];
    $inv_no=$row_order['invoice_no'];
    $order_status=$row_order['order_status'];
    $order_date=$row_order['order_date'];
    $number=1;

    if($order_status=='pending'){
        $order_status='Incomplete';
    }
    else{
        $order_status='Complete';
    }

    echo "<tr>
        <th>$number</th>
        <td>$amt</td>
        <td>$total_prod</td>
        <td>$inv_no</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='confirm_payment.php'>Confirm</a></td>
      </tr>";

    $number++;
}

?>

   
  </tbody>
</table>
