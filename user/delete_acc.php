
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Edit Detail </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
}
.container{
  max-width: 900px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: #333;
}

form .button{
   height: 50px;
   width:400px;
   margin: 35px 0;
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: #333;
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background:#333;
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
 }
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  
.login-link {
  text-align: center;
  margin-top: 20px;
}

.login-link a {
  color: #be4d25;
  text-decoration: none;
  font-weight: bold;
}

.login-link a:hover {
  text-decoration: underline;
}


</style>
<body>
<div class="container">
    <div class="title">Edit Account</div>
    <div class="content">
      <form action="#" method="post" encrypt="multipart/form-data">
      <h4>If you delete your account it will do following:</h4>
      <p>1) Log out from all your devices</p>
      <p>2) Delete all account related information</p>
      <h4>Are you sure you want to delete your account?</h4>
      <div class="button">
          <input type="submit" value="Don't mind, just keep the account" name="keep_acc">
        </div>
      <div class="button">
          <input type="submit" value="Delete Account" name="del_acc">
        </div>
        
      </form>
      
 
    </div>
  </div>

  <?php


require_once('../includes/connect.php');

if(isset($_POST['del_acc'])){
    $user_email = $_SESSION['email']; // Get the email from the session
    
    // Prepare the delete statement
    $delete_user = "DELETE FROM `user_table` WHERE user_email=?";
    
    $stmt = mysqli_prepare($con, $delete_user);

    if($stmt){
        // Bind the email parameter
        mysqli_stmt_bind_param($stmt, "s", $user_email);

        // Execute the statement
        if(mysqli_stmt_execute($stmt)){
            // Logout the user by destroying the session
            session_destroy();
            
            // Redirect to index.php after successful deletion
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php', '_self')</script>";
            exit();
        } else {
            echo "Error executing delete statement: " . mysqli_error($con);
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing delete statement: " . mysqli_error($con);
    }
}

if(isset($_POST['keep_acc'])){
    echo "<script>window.open('profile.php', '_self')</script>";
}
?>




</body>
</html>