<?php
require_once('../includes/connect.php');
require_once('../functions/common_func.php');

global $user_id, $username, $user_email, $user_address, $user_mobile, $user_gender;

$username = "";
$user_email = "";
$user_address = "";
$user_mobile = "";
$user_gender = "";

if(isset($_GET['edit_acc'])){
    $user_name = $_SESSION['email'];
    $select = "SELECT * FROM `user_table` WHERE user_email=?";
    $stmt = mysqli_prepare($con, $select);

    mysqli_stmt_bind_param($stmt, "s", $user_name);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful
    if($result){
        $row = mysqli_fetch_assoc($result);
        
        // Check if the row exists
        if($row){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_email = $row['user_email'];
            $user_address = $row['user_address'];
            $user_mobile = $row['user_mobile'];
            $user_gender = $row['user_gender'];
        }
        else {
            echo "No user found with the provided email.";
        }
    } 
    else {
        // Handle query execution error
        echo "Error executing the query: " . mysqli_error($con);
    }

    if(isset($_POST['save'])){
        $edit_id = $user_id;
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
        $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
        $user_mobile = mysqli_real_escape_string($con, $_POST['user_mobile']);
        $user_gender = mysqli_real_escape_string($con, $_POST['user_gender']);

        // Update query with prepared statement
        $update = "UPDATE `user_table` SET username=?, user_email=?, user_address=?, user_mobile=?, user_gender=? WHERE user_id=?";
        
        $stmt = mysqli_prepare($con, $update);
        
        if($stmt){
            mysqli_stmt_bind_param($stmt, "sssssi", $username, $user_email, $user_address, $user_mobile, $user_gender, $edit_id);
            mysqli_stmt_execute($stmt);
            echo "<script>alert('Data Updated Successfully')</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>




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
  height: auto;
  width: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}
/* body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
} */
/* .container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
} */
/* .container{
  width: auto;
  display: flex;
  justify-content: center;
  align-items: center;
} */
.container{
  margin-top: 100px;
  margin-right: 200px;
}
.edit{
  width: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}
.edit .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
/* .container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: #333;
} */
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  /* margin: 20px 0 12px 0; */
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}





 form .button{
   height: 45px;
   margin: 35px 0
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
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
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


.input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}

.input-box .details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}

.gender-options {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}

.gender-options input[type="radio"] {
  display: none;
}

.gender-options label {
  position: relative;
  padding-left: 25px;
  cursor: pointer;
  font-size: 16px;
}

.gender-options label:before {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: #ccc;
  border: 2px solid #ccc;
  transition: all 0.3s ease;
}

.gender-options input[type="radio"]:checked + label:before {
  background: #333;
  border-color: #333;
}

.gender-options label:hover:before {
  transform: scale(1.1);
}
</style>
   </head>
<body>
  <div class="container">
    <div class="edit">
    <div class="title">Edit Account</div>
    </div>
    <div class="content">
      <form action="#" method="post" encrypt="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">User Name</span>
            <input type="text" id="username" name="username"  value="<?php echo $username?>">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="user_email" name="user_email" value="<?php echo $user_email?>">
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" id="user_address" name="user_address" value="<?php echo $user_address?>">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="user_mobile" name="user_mobile" value="<?php echo $user_mobile?>">
          </div>
         
        </div>

        <div class="input-box">
                    <span class="details">Gender</span>
                    <div class="gender-options">
                        <input type="radio" id="male" name="user_gender" value="male" <?php echo ($user_gender == 'male') ? 'checked' : ''; ?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="user_gender" value="female" <?php echo ($user_gender == 'female') ? 'checked' : ''; ?>>
                        <label for="female">Female</label>
                        <input type="radio" id="not_to_say" name="user_gender" value="not_to_say" <?php echo ($user_gender == 'not_to_say') ? 'checked' : ''; ?>>
                        <label for="not_to_say">Not to Say</label>
                    </div>
          </div>
        
        
        <div class="button">
          <input type="submit" value="Save" name="save">
        </div>
      </form>
      
 
    </div>
  </div>


</body>
</html>
