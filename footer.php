

  <!--
    - FOOTER
  -->

  <footer>

    <div class="footer-category">

      <div class="container">

        <h2 class="footer-category-title">Brand directory</h2>

        <?php
        include('includes/connect.php');
        require_once('functions/common_func.php');

        getcategory('footer');

  
  ?>



      </div>

    </div>

    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Popular Categories</h2>
          </li>

          
<?php
require_once('includes/connect.php');
          $select_category="select * from `categories`";
    $result_category=mysqli_query($con,$select_category);

    while($row_data=mysqli_fetch_assoc($result_category)){
          $category_title=$row_data['cat_title'];
          $category_id=$row_data['cat_id'];

          echo "<li class='footer-nav-item'>
          <a href='index.php' class='footer-nav-link'>$category_title</a>
        </li>";
         
       
    } 
    ?>

        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">SubCategories</h2>
          </li>
        
          <?php
require_once('includes/connect.php');
          $select_subcategory="select * from `subcategories`";
    $result_subcategory=mysqli_query($con,$select_subcategory);

    while($row_data=mysqli_fetch_assoc($result_subcategory)){
          $subcategory_title=$row_data['subcat_title'];
          $subcategory_id=$row_data['subcat_id'];

          echo "<li class='footer-nav-item'>
          <a href='#' class='footer-nav-link'>$subcategory_title</a>
        </li>";
         
       
    } 
    ?>
        
          
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="worldwide.php" class="footer-nav-link">Worldwide delivery</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="nextday.php" class="footer-nav-link">Next day delivery</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="onlinesupport" class="footer-nav-link">Online support</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="returnpolicy.php" class="footer-nav-link">Return Policy</a>
          </li>
        
        
        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
            123 Main St
              Bengaluru, Karnataka(KA), 560001, India

            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link">+91 98765 43210</a>


          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">shopzy@gmail.com</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">

        <p class="copyright">
          Copyright &copy; <a href="#">Shopzy</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>






  <!--
    - custom js link
  -->
  <script src="script.js"></script>
  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>