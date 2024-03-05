<?php

//to display category
function getcategory($page){
    global $con,$category_id;
    $select_category="select * from `categories`";
    $result_category=mysqli_query($con,$select_category);

    while($row_data=mysqli_fetch_assoc($result_category)){
          $category_title=$row_data['cat_title'];
          $category_id=$row_data['cat_id'];


          if($page == 'header'){
            echo "<li class='menu-category'>
            <a href='#' class='menu-title'>$category_title</a>";

            $subcategories = getSubcategories($con);
            if (!empty($subcategories)){
                echo "<ul class='dropdown-list'>";
                foreach ($subcategories as $subcat){
                    $subcategory_title = $subcat['subcat_title'];
                    $subcategory_id=$subcat['subcat_id'];
                    echo "<li class='dropdown-item'>
                    <a href='unique_subcat.php?subcat_id=$subcategory_id' class='menu-title'>$subcategory_title</a>";
                }
                echo "</ul>";
            }
            echo "</li>";
        } 
        else if($page == 'footer'){
            echo "<div class='footer-category-box'>";
            echo "<h3 class='category-box-title'>$category_title:</h3>";

            $subcategories = getSubcategories($con);
            if (!empty($subcategories)){
                foreach ($subcategories as $subcat){
                    $subcategory_title = $subcat['subcat_title'];
                    echo "<a href='#' class='footer-category-link'>$subcategory_title</a>";
                }
            }
      
            echo "</div>";
        } 
        else if($page == 'add_subcat'){
          echo "<option value='$category_id'>$category_title</option>";
        }

       
    } 
    
}


//to display subcategory          
function getSubcategories($con){
  global $category_id;
  $select_subcategory="select * from `subcategories` where cat_id = $category_id";
  $result_subcategory=mysqli_query($con,$select_subcategory);
  $subcategories = array();

  if (mysqli_num_rows($result_subcategory) > 0){
      while($row_subdata=mysqli_fetch_assoc($result_subcategory)){
          $subcategories[] = $row_subdata;
      }
  }
  return $subcategories;
}

//to display products
function getproducts(){
global $con;
$select="select * from `product` order by rand() LIMIT 0,4";
$result=mysqli_query($con,$select);

$select_subcategory="select * from `subcategories`";
$result_subcategory=mysqli_query($con,$select_subcategory);
$row_sub=mysqli_fetch_assoc($result_subcategory);
$subcategory_title=$row_sub['subcat_title'];


while($row=mysqli_fetch_assoc($result)){
  $product_id=$row['prod_id'];
  $product_title=$row['prod_title'];
  $product_description=$row['prod_desc'];
  $product_img1=$row['prod_img1'];
  $product_img2=$row['prod_img2'];
  $product_price=$row['prod_price'];
  $subcat_id=$row['subcat_id'];
  $product_feat1=$row['prod_feat1'];
  $product_feat2=$row['prod_feat2'];
  $product_feat3=$row['prod_feat3'];
  $product_dis=$row['prod_discount'];
  $del=$product_price+($product_dis * $product_price)/100;
 
  echo "<div class='showcase'>";
  echo "<div class='showcase-banner'>"; 
  echo "<img src='./admin/product_img/$product_img1' alt='$product_title' width=\"300\" class='product-img default'>
    <img src='./admin/product_img/$product_img2' alt='$product_title' width=\"300\" class='product-img hover'>

    <p class='showcase-badge'>$product_dis%</p>

    <div class='showcase-actions'>

      <button class='btn-action'>
      <a href='product_detail.php?prod_id=$product_id'>
        <ion-icon name='eye-outline'></ion-icon></a>
      </button>

      <button class='btn-action'>
      <a href='index.php?add_to_cart=$product_id'>
        <ion-icon name='bag-add-outline'></ion-icon></a>
      </button>

    </div>";

  echo "</div>";

  echo "<div class='showcase-content'>

    <a href='#' class='showcase-category'>$subcategory_title</a>

    <a href='#'>
      <h3 class='showcase-title'>$product_title</h3>
    </a>

    <div class='showcase-rating'>
      <ion-icon name='star'></ion-icon>
      <ion-icon name='star'></ion-icon>
      <ion-icon name='star'></ion-icon>
      <ion-icon name='star-outline'</ion-icon>
      <ion-icon name='star-outline'></ion-icon>
    </div>
    

    <div class='price-box'>
      <p class='price'>₹$product_price/-</p>
      <del>₹$del/-</del>
    </div>

  </div>";

echo "</div>";

}
}


function get_unique_subcat() {
  global $con;

  if(isset($_GET['subcat_id'])) {
      $subcategory_id = $_GET['subcat_id'];

      
      $select_products = "SELECT * FROM `product` WHERE subcat_id = $subcategory_id";
      $result_products = mysqli_query($con, $select_products);

$select_subcategory="select * from `subcategories`";
$result_subcategory=mysqli_query($con,$select_subcategory);
$row_sub=mysqli_fetch_assoc($result_subcategory);
$subcategory_title=$row_sub['subcat_title'];

      
      if($result_products) {
          
          if(mysqli_num_rows($result_products) > 0) {
              
              echo "<div class='product-container'>"; 
              while($row_product = mysqli_fetch_assoc($result_products)) {
                $product_id=$row_product['prod_id'];
                $product_title=$row_product['prod_title'];
                $product_description=$row_product['prod_desc'];
                $product_img1=$row_product['prod_img1'];
                $product_img2=$row_product['prod_img2'];
                $product_price=$row_product['prod_price'];
                $subcat_id=$row_product['subcat_id'];
                $product_feat1=$row_product['prod_feat1'];
                $product_feat2=$row_product['prod_feat2'];
                $product_feat3=$row_product['prod_feat3'];
                $product_dis=$row_product['prod_discount'];
                $del=$product_price+($product_dis * $product_price)/100;

                
                echo "<div class='showcase'>";
  echo "<div class='showcase-banner'>"; 
  echo "<img src='./admin/product_img/$product_img1' alt='$product_title' width=\"300\" class='product-img default'>
    <img src='./admin/product_img/$product_img2' alt='$product_title' width=\"300\" class='product-img hover'>

    <p class='showcase-badge'>$product_dis%</p>

    <div class='showcase-actions'>

      <button class='btn-action'>
      <a href='product_detail.php?prod_id=$product_id'>
        <ion-icon name='eye-outline'></ion-icon></a>
      </button>

      <button class='btn-action'>
      <a href='index.php?add_to_cart=$product_id'>
        <ion-icon name='bag-add-outline'></ion-icon></a>
      </button>

    </div>";

  echo "</div>";

  echo "<div class='showcase-content'>

    <a href='#' class='showcase-category'>$subcategory_title</a>

    <a href='#'>
      <h3 class='showcase-title'>$product_title</h3>
    </a>

    <div class='showcase-rating'>
      <ion-icon name='star'></ion-icon>
      <ion-icon name='star'></ion-icon>
      <ion-icon name='star'></ion-icon>
      <ion-icon name='star-outline'</ion-icon>
      <ion-icon name='star-outline'></ion-icon>
    </div>
    

    <div class='price-box'>
      <p class='price'>₹$product_price/-</p>
      <del>₹$del/-</del>
    </div>

  </div>";

echo "</div>";
                

              }
                
          } else {
             
              echo "<h3><p style='text-align: center; margin: 20px; padding: 10px; color: #be4d25;'>
              No products found for this subcategory.</p></h3>";
          }
      } else {
         
          echo "Error: " . mysqli_error($con);
      }
  } else {
     
      echo "<p style='text-align: center; margin: 20px; padding: 10px; color: #be4d25;'>No subcategory ID provided.</p>";
  }
}


function search_prod(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data=$_GET['search_data'];
    $search_query="select * from `product` where prod_key like '%$search_data%'";
    $result=mysqli_query($con,$search_query);

  $select_subcategory="select * from `subcategories`";
$result_subcategory=mysqli_query($con,$select_subcategory);
$row_sub=mysqli_fetch_assoc($result_subcategory);
$subcategory_title=$row_sub['subcat_title'];

    if($result) {
          
      if(mysqli_num_rows($result) > 0) {

while($row=mysqli_fetch_assoc($result)){
  $product_id=$row['prod_id'];
  $product_title=$row['prod_title'];
  $product_description=$row['prod_desc'];
  $product_img1=$row['prod_img1'];
  $product_img2=$row['prod_img2'];
  $product_price=$row['prod_price'];
  $subcat_id=$row['subcat_id'];
  $product_feat1=$row['prod_feat1'];
  $product_feat2=$row['prod_feat2'];
  $product_feat3=$row['prod_feat3'];
  $product_dis=$row['prod_discount'];
  $del=$product_price+($product_dis * $product_price)/100;
 

  echo "<div class='showcase'>";
    echo "<div class='showcase-banner'>"; 
    echo "<img src='./admin/product_img/$product_img1' alt='$product_title' width=\"300\" class='product-img default'>
      <img src='./admin/product_img/$product_img2' alt='$product_title' width=\"300\" class='product-img hover'>
  
      <p class='showcase-badge'>$product_dis%</p>
  
      <div class='showcase-actions'>
  
        <button class='btn-action'>
        <a href='product_detail.php?prod_id=$product_id' style='color: #be4d25;'>
          <ion-icon name='eye-outline'></ion-icon></a>
        </button>
  
        <button class='btn-action'>
        <a href='index.php?add_to_cart=$product_id'>
          <ion-icon name='bag-add-outline' style='color:#be4d25;'></ion-icon></a>
        </button>
  
      </div>";
  
    echo "</div>";
  
    echo "<div class='showcase-content'>
  
      <a href='#' class='showcase-category'>$subcategory_title</a>
  
      <a href='#'>
        <h3 class='showcase-title'>$product_title</h3>
      </a>
  
      <div class='showcase-rating'>
        <ion-icon name='star'></ion-icon>
        <ion-icon name='star'></ion-icon>
        <ion-icon name='star'></ion-icon>
        <ion-icon name='star-outline'</ion-icon>
        <ion-icon name='star-outline'></ion-icon>
      </div>
  
      <div class='price-box'>
        <p class='price'>₹$product_price/-</p>
        <del>₹$del/-</del>
      </div>
  
    </div>";
  
  echo "</div>";

}
      }
      else{
        echo "<h3><p style='text-align: center; margin: 20px; padding: 10px; color: #be4d25;'>
              No products found for your search</p></h3>";
      }
  }
}
}


function get_all(){
  global $con;
  $select="select * from `product` order by rand()";
  $result=mysqli_query($con,$select);

$select_subcategory="select * from `subcategories`";
$result_subcategory=mysqli_query($con,$select_subcategory);
$row_sub=mysqli_fetch_assoc($result_subcategory);
$subcategory_title=$row_sub['subcat_title'];
  
  while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['prod_id'];
    $product_title=$row['prod_title'];
    $product_description=$row['prod_desc'];
    $product_img1=$row['prod_img1'];
    $product_img2=$row['prod_img2'];
    $product_price=$row['prod_price'];
    $subcat_id=$row['subcat_id'];
    $product_feat1=$row['prod_feat1'];
    $product_feat2=$row['prod_feat2'];
    $product_feat3=$row['prod_feat3'];
    $product_dis=$row['prod_discount'];
    $del=$product_price+($product_dis * $product_price)/100;
   
    echo "<div class='showcase'>";
    echo "<div class='showcase-banner'>"; 
    echo "<img src='./admin/product_img/$product_img1' alt='$product_title' width=\"300\" class='product-img default'>
      <img src='./admin/product_img/$product_img2' alt='$product_title' width=\"300\" class='product-img hover'>
  
      <p class='showcase-badge'>$product_dis%</p>
  
      <div class='showcase-actions'>
  
        <button class='btn-action'>
        <a href='product_detail.php?prod_id=$product_id'>
          <ion-icon name='eye-outline'></ion-icon></a>
        </button>
  
        <button class='btn-action'>
        <a href='index.php?add_to_cart=$product_id'>
          <ion-icon name='bag-add-outline'></ion-icon></a>
        </button>
  
      </div>";
  
    echo "</div>";
  
    echo "<div class='showcase-content'>
  
      <a href='#' class='showcase-category'>$subcategory_title</a>
  
      <a href='#'>
        <h3 class='showcase-title'>$product_title</h3>
      </a>
  
      <div class='showcase-rating'>
        <ion-icon name='star'></ion-icon>
        <ion-icon name='star'></ion-icon>
        <ion-icon name='star'></ion-icon>
        <ion-icon name='star-outline'</ion-icon>
        <ion-icon name='star-outline'></ion-icon>
      </div>
  
      <div class='price-box'>
        <p class='price'>₹$product_price/-</p>
        <del>₹$del/-</del>
      </div>
  
    </div>";
  
  echo "</div>";

  
  }
  }

function get_detail(){
  global $con;
    if(isset($_GET['prod_id'])){
      $product_id=($_GET['prod_id']);
      $select="select * from `product` where prod_id=$product_id";
      $result=mysqli_query($con,$select);

while($row=mysqli_fetch_assoc($result)){
  $product_id=$row['prod_id'];
  $product_title=$row['prod_title'];
  $product_description=$row['prod_desc'];
  $product_img1=$row['prod_img1'];
  $product_img2=$row['prod_img2'];
  $product_price=$row['prod_price'];
  $subcat_id=$row['subcat_id'];
  $product_feat1=$row['prod_feat1'];
  $product_feat2=$row['prod_feat2'];
  $product_feat3=$row['prod_feat3'];
  $product_dis=$row['prod_discount'];
  $del=$product_price+($product_dis * $product_price)/100;
 
  echo "<div class='container-d'>
  <div class='product-box-d'>
      <div class='product-image-d'>
          <img src='./admin/product_img/$product_img1' alt='$product_title'>
      </div>
      <div class='product-details-d'>
          <h1 class='product-title-d'>$product_title</h1>
          <p class='product-price-d'>₹$product_price/-</p>
          
          <p class='product-description-d'>$product_description</p>
          <h1 class='product-title-d'>Features:</h1>
          <p class='product-description-d'>$product_feat1</p>
          <p class='product-description-d'>$product_feat2</p>
          <p class='product-description-d'>$product_feat3</p>
         
          <div class='button-container-d'>
              <div class='add-to-cart-d'>
              <a href='index.php?add_to_cart=$product_id'>
                  <button>Add to Cart</button></a>
              </div>
              <div class='shop-now-d'>
                  <button>Shop Now</button>
              </div>
          </div>
      </div>
  </div>
</div>";

}
}
}


function getIPAddress() {    
    
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
     
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
 
}    



function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();  
    $get_prod_id = $_GET['add_to_cart'];
    $select = "SELECT * FROM `cart` WHERE ip_add='$ip' AND prod_id=$get_prod_id";
    $result = mysqli_query($con, $select);
    if (!$result) {
        die('Error executing query: ' . mysqli_error($con));
    }
    
    $row = mysqli_num_rows($result);
    
    if($row > 0){
      echo "<script>alert('This product is already present inside the cart')</script>";
      echo "<script>window.open('index.php')</script>"; 
    }
    else{
      $insert = "INSERT INTO `cart` (prod_id, ip_add, quantity) VALUES ($get_prod_id, '$ip', 0)";
      $result = mysqli_query($con, $insert);
      echo "<script>alert('Product is successfully added into the cart')</script>";
      echo "<script>window.open('index.php')</script>"; 
    }
  }
}


function cart_number(){

  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();  
    $select = "SELECT * FROM `cart` WHERE ip_add='$ip'";
    $result = mysqli_query($con, $select);
    if (!$result) {
        die('Error executing query: ' . mysqli_error($con));
    }
    
    $count = mysqli_num_rows($result);
  }
    
    else{
    global $con;
    $ip = getIPAddress();  
    $select = "SELECT * FROM `cart` WHERE ip_add='$ip'";
    $result = mysqli_query($con, $select);
    if (!$result) {
        die('Error executing query: ' . mysqli_error($con));
    }
    
    $count = mysqli_num_rows($result);
    }
    echo $count;
}


function total_cart(){
  global $con;
  $ip = getIPAddress();  
  $total=0;
  $cart_query="select * from `cart` where ip_add='$ip'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['prod_id'];
    $select="select * from `product` where prod_id='$product_id'";
    $result_prod=mysqli_query($con,$select);
    while($row_prod=mysqli_fetch_array($result_prod)){
      $product_price=array($row_prod['prod_price']);
      $product_value=array_sum($product_price);
      $total=$total+$product_value;
    }
  }
  echo $total;
}

 
  



?>

  
  





