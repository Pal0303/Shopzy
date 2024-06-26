<?php
require_once(__DIR__ . '/includes/connect.php');

require_once('functions/common_func.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopzy</title>

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css?v=0.1">

  <!--
    - google font link
  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>
<div class="overlay" data-overlay></div>



  <!--
    - HEADER
  -->

  <header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

        <div class="header-alert-news">
          <p>
            <b>Free Shipping</b>
            This Week Order Over - ₹1000
          </p>
        </div>

      </div>

    </div>

    <div class="header-main">

      <div class="container">

        <a href="#" class="header-logo">
          <img src="./img/logo.png" alt="shopzy" width="110" height="90">
        </a>

        <div class="header-search-container">

          
        <form action="search_data.php" method="get">
    <input type="search" name="search_data" style="height: 53px;" class="search-field" placeholder="Search here...">
    <button class="search-btn">
    <input type="submit" value="Search"  class="btn btn-outline-danger btn-sm" name="search_data_product"></input></button>
</form>


        </div>

        <div class="header-user-actions">


<?php


session_start();
if(!isset($_SESSION['email'])){
  echo "<button class='action-btn'>
          <a href='./user/login_user.php'>
            <ion-icon name='person-outline' style='color: #be4d25;'></ion-icon></a>
        </button>";

} 
else {
  echo "<button class='action-btn'>
          <a href='./user/logout_user.php'>
            <ion-icon name='log-out-outline' style='color: #be4d25;'></ion-icon></a>
        </button> <button class='action-btn'>
        <a href='./user/profile.php'>
            <ion-icon name='person-circle-outline' style='color: #be4d25;'></ion-icon>
        </a>
    </button>";
}

?>

          <button class="action-btn">
            <a href="cart.php">
            <ion-icon name="bag-handle-outline" style="color: #be4d25;"></ion-icon>
            <span class="count">
            <?php
            cart_number();
              ?></span></a>
          </button>

        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
			<a href="index.php" class="menu-title">Home</a>
          </li>


          <li class="menu-category">
            <a href="explore.php" class="menu-title">Explore</a>
          </li>

            <div class="dropdown-panel">
            </div>
          
  <?php
        include('includes/connect.php');
        require_once('functions/common_func.php');
        getcategory('header');
  

  ?>
<li class="menu-category">
			<a href="bot.php" class="menu-title">Chatbot</a>
          </li>

      </div>

    </nav>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>


        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>

      </ul>

     

    </nav>

  </header>