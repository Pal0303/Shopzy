<?php
require_once('../includes/connect.php');

$user_name = $_SESSION['email'];
$get_user = "SELECT * FROM `user_table` WHERE user_email='$user_name'";
$result=mysqli_query($con,$get_user);
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['publish'])) {
    $blog_name = $_POST['blog_name'];
    $blog_title = $_POST['blog_title'];
    $blog_description = $_POST['blog_description'];
    $blog_content = $_POST['blog_content'];
    
    // File upload handling
    $blog_img = isset ($_FILES['blog_image']['name']) ? $_FILES['blog_image']['name'] : '';
    $tmp_img = isset ($_FILES['blog_image']['tmp_name']) ? $_FILES['blog_image']['tmp_name'] : '';
    
    if ($blog_name === '' || $blog_title === '' || $blog_description === '' || $blog_content === '' || $blog_img === '') {
        echo "<script>alert('Please fill all the available fields')</script>";

    } else {
        $upload_directory = "./blog/";
        move_uploaded_file($tmp_img, $upload_directory . $blog_img);

        $insert_blog = "INSERT INTO `blogs` (user_id, blog_name, blog_title, blog_description, blog_content, blog_date, blog_image)
                    VALUES ($user_id,'$blog_name', '$blog_title', '$blog_description', '$blog_content', NOW(), '$blog_img' )";

        $result_query = mysqli_query($con, $insert_blog);
        if ($result_query) {
            echo "<script>alert('Successfully published the blog')</script>";
        }
    }
    
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Blog Form </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 90vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }

    .container {
      max-width: 1200px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
      margin-bottom: 20px;
    }

    .input-box {
      margin-bottom: 15px;
    }

    .input-box .details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .input-box input,
    .input-box textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 16px;
      transition: border-color 0.3s ease;
    }

    .input-box input:focus,
    .input-box textarea:focus {
      border-color: #9b59b6;
    }

    .button {
      margin-top: 20px;
    }

    .button input[type="submit"] {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .button input[type="submit"]:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">Create New Blog</div>
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="input-box">
        <span class="details">Blog Name</span>
        <input type="text" id="blog_name" name="blog_name">
      </div>
      <div class="input-box">
        <span class="details">Blog Title</span>
        <input type="text" id="blog_title" name="blog_title">
      </div>
      <div class="input-box">
        <span class="details">Blog Description</span>
        <input type="text" id="blog_description" name="blog_description">
      </div>
      <div class="input-box">
        <span class="details">Blog Content</span>
        <textarea id="blog_content" name="blog_content" rows="10"></textarea>
      </div>
      
      <div class="input-box">
        <span class="details">Blog Image</span>
        <input type="file" id="blog_image" name="blog_image">
      </div>
      <div class="button">
        <input type="submit" value="Publish" name="publish">
      </div>
    </form>
  </div>
</body>
</html>
