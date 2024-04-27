<?php
include('header.php');
require_once('functions/common_func.php');
?>

  <!--
    - MAIN
  -->
  <main>
    

    <!--
      - BANNER
    -->

    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          
      <div class="slider-item">

            <img src="./img/fashion_5.png" alt="women's latest fashion sale" class="banner-img">

          </div>

          <div class="slider-item">

            <img src="./img/fashion_6.png" alt="modern sunglasses" class="banner-img">

          </div>

          <div class="slider-item">

            <img src="./img/fashion_7.png" alt="new fashion summer sale" class="banner-img">

          </div>

        </div>

      </div>

    </div>

          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">

<?php

getproducts();
getIPAddress();
cart();
?>

            </div>

          </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">testimonial</h2>

            <div class="testimonial-card">

              <img src="./img/testi1.jpg" alt="alan doe" class="testimonial-banner" width="96" height="90">

              <p class="testimonial-name">Pal Dave</p>

              <p class="testimonial-title">CEO & Founder Shopzy</p>

              <img src="./img/quotes.svg" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
               Visionary leadership and unwavering dedication propel Shopzy to unprecedented success.
              </p>

            </div>

          </div>



          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="./img/cta-banner.jpg" alt="summer collection" class="cta-banner">

            <a href="explore.php" class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Summer collection</h2>

              <p class="cta-text">Starting @ RS.200</p>

              <button class="cta-btn">Shop now</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Our Services</h2>

            <div class="service-container">

              <a href="worldwide.php" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">
                  Worldwide Delivery
                  </h3>
                  <p class="service-desc">For Order Over Rs.2500</p>

                </div>

              </a>

              <a href="nextday.php" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Next Day delivery</h3>
                  <p class="service-desc">India Orders Only</p>
              
                </div>
              
              </a>

              <a href="onlinesupport.php" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Best Online Support</h3>
                  <p class="service-desc">Hours: 8AM - 11PM</p>
              
                </div>
              
              </a>

              <a href="returnpolicy.php" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Return Policy</h3>
                  <p class="service-desc">Easy & Free Return</p>
              
                </div>
              
              </a>

             
            </div>

          </div>

        </div>

      </div>

    </div>





    <!--
      - BLOG
    -->

    <?php



    ?>

    <div class="blog">

      <div class="container">

        <div class="blog-container has-scrollbar">
<?php
        getblog();
?>
        </div>

      </div>

    </div>

  </main>
<?php
include('footer.php');
?>

