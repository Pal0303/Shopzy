<?php
include ('../includes/connect.php');
?>


<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

.table {
    border-collapse: collapse;
    width: 90%;
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
      <th scope="col">Sr No.</th>
      <th scope="col">Category ID</th>
      <th scope="col">Category Title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>


  <?php

$get_cat= "SELECT * FROM `categories`";
$result=mysqli_query($con,$get_cat);
$number=1;

while($row=mysqli_fetch_assoc($result)){
    
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
   
    echo "<tr>
        <td>$number</td>
        <td>$cat_id</td>
        <td>$cat_title</td>
        <td><a href='index.php?edit_cat=$cat_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?del_cat=$cat_id'><i class='fas fa-trash-alt'></i></a></td>
      </tr>";
      $number++;

    
}

?>

  </tbody>
</table>
