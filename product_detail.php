<?php
require_once('functions/common_func.php');
include('header.php');
?>

<style>
.container-d {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    margin-right:100px;
    margin-left:100px;
}

.product-box-d {
    border: 2px solid #ccc;
    border-radius: 10px;
    display: flex;
    padding: 20px;
}

.product-image-d {
    margin-right: 20px;
}

.product-image-d img {
    max-width: 400px;
    height: 300px;;
}

.product-title-d {
    font-size: 24px;
    margin-top: 0;
}

.product-price-d {
    font-size: 20px;
    color: #be4d25;
}

.product-description-d {
    font-size: 16px;
    margin-bottom: 20px;
}

.quantity-d {
    margin-bottom: 20px;
}

.quantity-d label {
    font-size: 16px;
    margin-right: 10px;
}

.quantity-d input {
    width: 50px;
    padding: 5px;
    font-size: 16px;
}

.button-container-d {
    display: flex;
}

.add-to-cart-d, .shop-now-d {
    margin-right: 10px;
}

.add-to-cart-d button, .shop-now-d button {
    padding: 10px 20px;
    background-color: #be4d25;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.add-to-cart-d button:hover, .shop-now-d button:hover {
    background-color: #933c1d;
}


</style>




<?php
get_detail();
include('footer.php');
?>
