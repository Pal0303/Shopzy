<?php
require_once('functions/common_func.php');
include('header.php');
?>

<style>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.product-box {
    border: 2px solid #ccc;
    border-radius: 10px;
    display: flex;
    padding: 20px;
}

.product-image {
    margin-right: 20px;
}

.product-image img {
    max-width: 400px;
    height: 300px;;
}

.product-title {
    font-size: 24px;
    margin-top: 0;
}

.product-price {
    font-size: 20px;
    color: #be4d25;
}

.product-description {
    font-size: 16px;
    margin-bottom: 20px;
}

.quantity {
    margin-bottom: 20px;
}

.quantity label {
    font-size: 16px;
    margin-right: 10px;
}

.quantity input {
    width: 50px;
    padding: 5px;
    font-size: 16px;
}

.button-container {
    display: flex;
}

.add-to-cart, .shop-now {
    margin-right: 10px;
}

.add-to-cart button, .shop-now button {
    padding: 10px 20px;
    background-color: #be4d25;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.add-to-cart button:hover, .shop-now button:hover {
    background-color: #933c1d;
}


</style>




<?php
get_detail();
include('footer.php');
?>
