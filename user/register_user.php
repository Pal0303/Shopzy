<?php
require_once('../includes/connect.php');
require_once('../functions/common_func.php');
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Register </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="post" encrypt="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">User Name</span>
            <input type="text" id="username" name="username" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="ph_no" name="ph_no" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="conf_pwd" name="conf_pwd" placeholder="Confirm your password" required>
          </div>
        </div>

        <div class="input-box">
                    <span class="details">Gender</span>
                    <div class="gender-options">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="not_to_say" name="gender" value="not_to_say">
                        <label for="not_to_say">Not to Say</label>
                    </div>
          </div>
        
        
        <div class="button">
          <input type="submit" value="Register" name="register">
        </div>
      </form>
      
  <div class="login-link">
    Already have an account? <a href="login_user.php">Log in</a>
</div>
    </div>
  </div>


</body>
</html>

<?php
if(isset($_POST['register'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone=$_POST['ph_no'];
  $pwd=$_POST['password'];
  $hash=password_hash($pwd,PASSWORD_DEFAULT);
  $conf_pwd=$_POST['conf_pwd'];
  $gender=$_POST['gender'];
  $ip=getIPAddress();

  $select="select * from `user_table` where user_email='$email'";
  $result=mysqli_query($con,$select);
  $row=mysqli_num_rows($result);

  if($row>0){
    echo "<script>alert('Email already exists. Please register with a different email.')</script>";
  }
  else if($pwd!=$conf_pwd){
    echo "<script>alert('Passwords do not match. Please try again.')</script>";
  }
  else{
    $insert="insert into `user_table` (username, user_email, user_pwd, user_ip, user_address, user_mobile, user_gender) values 
    ('$username', '$email', '$hash', '$ip', '$address', '$phone', '$gender') ";
    $query=mysqli_query($con, $insert);
    
  if($query){
    echo "<script>alert('User Register Successfully')</script>";
  }
  else{
    die(mysqli_error($con));
  }

  }

  $select_cart="select * from `cart` where ip_add='$ip'";
  $result_cart=mysqli_query($con,$select_cart);
  $row_count=mysqli_num_rows($result_cart);
  if($row_count>0){
    $_SESSION['username']=$username;
    echo "<script>You have products on your cart</script>";
    echo "<script>window.open('checkout.php')</script>";
  }
  else{
    echo "<script>window.open('../index.php')</script>";
  }
}


?>