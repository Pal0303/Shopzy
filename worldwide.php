<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worldwide Delivery Service</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .custom-padding-btn {
            padding: 15px 30px;
        }
        .text_main{
            color: #be4d25;
        }
        span{
            color: #be4d25;
        }
        .shop_confidence{
            font-weight: 600;
        }
        .list-group{
            box-sizing: border-box;
            box-shadow: 0px 0px 5px #333;
        }
        .btn-primary, .btn-primary:hover{
            background-color: #be4d25;
            border: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center text_main">Worldwide Delivery for Orders Above ₹2500</h1>

    <p class="lead text-center">Elevate Your Shopping Experience with Global Shipping</p>

    <div class="row mt-4">
        <div class="col-md-12">
            <p class="">At <span>Shopzy</span>, we believe that everyone deserves access to quality products, no matter where they are in the world. That’s why we offer worldwide delivery for orders above ₹2500, bringing our exceptional range of products right to your doorstep, wherever you are.</p>
        </div>
    </div>

    <h2 class="text_main mt-5">Why Choose Worldwide Delivery with Us?</h2>

    <ul class="list-group mt-4">
        <li class="list-group-item">Extensive Global Reach: We ship to over 200 countries and regions, ensuring that you can enjoy our products regardless of your location.</li>
        <li class="list-group-item">Competitive Shipping Rates: We offer competitive shipping rates for international orders, making it affordable for you to shop with us from anywhere in the world. Plus, enjoy free shipping on orders above ₹2500.</li>
        <li class="list-group-item">Hassle-Free Customs Clearance: We handle all customs procedures, ensuring that your order reaches you without any delays or additional charges.</li>
        <li class="list-group-item">Secure Packaging: Your order is important to us, and we take extra care to ensure that it reaches you in perfect condition.</li>
    </ul>

    <h2 class="text_main mt-5">How It Works</h2>

    <ol class="mt-4">
        <li><strong>Shop Online:</strong> Browse our extensive collection of products and add your favorites to the cart.</li>
        <li><strong>Check Out:</strong> When you’re ready, proceed to checkout and enter your shipping address.</li>
        <li><strong>Select Shipping Option:</strong> Choose the international shipping option, and the shipping cost will be calculated based on your location and order value.</li>
        <li><strong>Track Your Order:</strong> Once your order is shipped, you’ll receive a tracking number to monitor its progress until it reaches you.</li>
    </ol>

    <p class="text_main shop_confidence lead mt-5">Shop with Confidence</p>

    <p>With our worldwide delivery service for orders above ₹2500, shopping internationally has never been easier or more affordable. Experience the convenience of shopping from the comfort of your home and enjoy our curated selection of products from around the world.</p>

    <a href="explore.php" class="btn btn-primary btn-lg mt-4 custom-padding-btn">Start Shopping Today!</a> <br><br><br>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include('footer.php');
?>
