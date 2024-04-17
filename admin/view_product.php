<?php
include ('../includes/connect.php');
?>


<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

.table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    margin-left: 30px;
    margin-right: 30px;
}

.table thead th {
    background-color: #071e26;
    color: white;
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.table tbody tr {
    background-color: #0f3c4c;
    border: 1px solid #ddd;
    color:white;
}

.table tbody td {
    padding: 10px;
    border: 1px solid #ddd;
}
a{
    color: white;
}
  
</style>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Title</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Discount</th>
      <th scope="col">Total Sold</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>


  <?php

$get_prod= "SELECT * FROM `product`";
$result=mysqli_query($con,$get_prod);

while($row=mysqli_fetch_assoc($result)){
    
    $prod_id=$row['prod_id'];
    $prod_title=$row['prod_title'];
    $prod_img=$row['prod_img1'];
    $prod_price=$row['prod_price'];
    $prod_discount=$row['prod_discount'];
    $status=$row['prod_status'];

    $select="select * from `pending_orders` where prod_id=$prod_id";
    $result_select=mysqli_query($con,$select);
    $count=mysqli_num_rows($result_select);
   
    echo "<tr>
        <th>$prod_id</th>
        <td>$prod_title</td>
        <td><img src='product_img/$prod_img' style='width: 90px; height: auto; display: block; margin: 0 auto;'></td>
        <td>$prod_price</td>
        <td>$prod_discount</td>
        <td>$count</td>
        <td>$status</td>
        <td><a href='index.php?edit_prod=$prod_id'><i class='fa-solid fa-pen-to-square'></i></td>
        <td><i class='fas fa-trash-alt'></i></td>
      </tr>";

    
}

?>

  </tbody>
</table>
