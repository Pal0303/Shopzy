<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
  <div class="container">
    <div class="title">Login</div>
    <div class="content">
      <form action="#" method="post" encrypt="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="email" name="email" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Login" name="login">
        </div>
      </form>
      <div class="login-link">
    Don't have an account? <a href="register_user.php">Register</a>
</div>
    </div>
  </div>
</body>
</html>


<?php


require_once('../includes/connect.php');
require_once('../functions/common_func.php');
@session_start();

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    
    $ip=getIPAddress();

    $select="select * from `user_table` where user_email='$email'";
    $result=mysqli_query($con,$select);
    $row=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    $select_cart="select * from `cart` where ip_add='$ip'";
    $result_cart=mysqli_query($con,$select_cart);
    $row_count=mysqli_num_rows($result_cart);
    
    if($row>0){
      $_SESSION['email']=$email;  // Set the email session variable
      if(password_verify($pwd, $row_data['user_pwd'])){
        if($row==1 and $row_count==0){
          echo "<script>alert('Login Successful')</script>";
          header('Location: ../index.php');
        }
        else{
          echo "<script>alert('Login Successful')</script>";
          header('Location: ../payment.php');
        }
      }
      else{
        echo "<script>alert('Invalid Credentials')</script>";
      }
    }
    // if($row>0){
    //   $_SESSION['email']=$email;
    //     if(password_verify($pwd, $row_data['user_pwd'])){
         
    //         if($row==1 and $row_count==0){
    //           $_SESSION['email']=$email;
    //             echo "<script>alert('Login Suceessful')</script>";
    //             header('Location: ../index.php');
    //         }
    //         else{
    //           $_SESSION['email']=$email;
    //             echo "<script>alert('Login Suceessful')</script>";
    //             header('Location: ../payment.php');
    //         }
    //     }
    //     else{
    //         echo "<script>alert('Invalid Credentials')</script>";
    //     }
    // }

    // else{
    //     echo "<script>alert('Invalid Credentials')</script>";
    // }

}

?>